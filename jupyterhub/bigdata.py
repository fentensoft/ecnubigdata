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

from .oauth2 import OAuthLoginHandler, OAuthenticator

# Support bigdata.com and bigdata enterprise installations
BIGDATA_HOST = 'test.lymtony.cn'
BIGDATA_API = 'test.lymtony.cn/api/user'

class bigdataLoginHandler(OAuthLoginHandler, GitHubMixin):
    pass


class bigdataOAuthenticator(OAuthenticator):
    
    login_service = "JupyterHub"    
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
        
        url = url_concat("http://%s/oauth/token" % BIGDATA_HOST, params)
        
        req = HTTPRequest(url,
                          method="POST",
                          headers={"Accept": "application/json"},
                          body='' # Body is required for a POST...
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

