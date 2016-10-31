"""
Custom Authenticator to use GitHub OAuth with JupyterHub

Most of the code c/o Kyle Kelley (@rgbkrk)
"""


import json
import os

import urllib
import requests

from tornado.auth import OAuth2Mixin
from tornado import gen, web

from tornado.httputil import url_concat
from tornado.httpclient import HTTPRequest, AsyncHTTPClient

from jupyterhub.auth import LocalAuthenticator

from traitlets import Unicode

from oauthenticator.oauth2 import OAuthLoginHandler, OAuthenticator

# Support bigdata.com and bigdata enterprise installations
BIGDATA_HOST = os.environ.get('BIGDATA_HOST')
BIGDATA_API = "%s/api/user" % BIGDATA_HOST

class bigdataMixin(OAuth2Mixin):
    _OAUTH_AUTHORIZE_URL = "http://%s/oauth/authorize" % BIGDATA_HOST
    _OAUTH_ACCESS_TOKEN_URL = "http://%s/oauth/token" % BIGDATA_HOST

class bigdataLoginHandler(OAuthLoginHandler, bigdataMixin):
    pass


class bigdataOAuthenticator(OAuthenticator):
    
    login_service = "BigData"
    client_id_env = 'BIGDATA_CLIENT_ID'
    client_secret_env = 'BIGDATA_CLIENT_SECRET'    
    login_handler = bigdataLoginHandler
    
    @gen.coroutine
    def authenticate(self, handler, data=None):
        code = handler.get_argument("code", False)
        if not code:
            raise web.HTTPError(400, "oauth callback made without a token")
        # TODO: Configure the curl_httpclient for tornado
        http_client = AsyncHTTPClient()
        
        # Exchange the OAuth code for a GitHub Access Token
        #
        # See: https://developer.bigdata.com/v3/oauth/
        
        params = dict(
            client_id=self.client_id,
            client_secret=self.client_secret,
            code=code,
            redirect_uri=self.oauth_callback_url,
            grant_type="authorization_code"
        )
               
        resp = requests.post("http://%s/oauth/token" % BIGDATA_HOST, params)
        resp_json = resp.json()
        access_token = resp_json['access_token']
        # Determine who the logged in user is
        
        headers={"Accept": "application/json",
                 "User-Agent": "JupyterHub",
                 "Authorization": "Bearer {}".format(access_token)
        }
        req = HTTPRequest("http://%s" % BIGDATA_API,
                          method="GET",
                          headers=headers
                          )
        resp = yield http_client.fetch(req)
        return resp.body.decode('utf8', 'replace')


class LocalbigdataOAuthenticator(LocalAuthenticator, bigdataOAuthenticator):

    """A version that mixes in local system user creation"""
    pass

