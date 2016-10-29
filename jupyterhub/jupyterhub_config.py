# Configuration file for Jupyter Hub

c = get_config()
c.JupyterHub.spawner_class = 'dockerspawner.DockerSpawner'
c.JupyterHub.authenticator_class = 'oauthenticator.bigdataOAuthenticator'

from jupyter_client.localinterfaces import public_ips
c.JupyterHub.hub_ip = public_ips()[0]


#These configs need to be changed
#---------------------------------------------------------------
c.JupyterHub.api_tokens = {"admin_token_here": 'fentensoft'}
c.bigdataOAuthenticator.client_id = "client_id_here"
c.bigdataOAuthenticator.client_secret = "client_secret_here"
c.bigdataOAuthenticator.oauth_callback_url = "callback_url_here"
#---------------------------------------------------------------

c.Authenticator.whitelist = whitelist = set()
c.Authenticator.admin_users = admin = set()
whitelist.add("administrator")
admin.add("administrator")