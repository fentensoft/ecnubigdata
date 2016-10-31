# Configuration file for Jupyter Hub
import os
import sys
sys.path.append(os.path.dirname(os.path.realpath(__file__)))
from bigdata import *

c = get_config()
c.JupyterHub.spawner_class = 'dockerspawner.DockerSpawner'
c.JupyterHub.authenticator_class = 'bigdata.bigdataOAuthenticator'
from jupyter_client.localinterfaces import public_ips
c.JupyterHub.hub_ip = public_ips()[0]
c.Authenticator.whitelist = whitelist = set()
c.Authenticator.admin_users = admin = set()
whitelist.add("administrator")
admin.add("administrator")

#These configs need to be changed
#---------------------------------------------------------------
c.JupyterHub.api_tokens = {"admin_token_here": 'administrator'}
#---------------------------------------------------------------
c.DockerSpawner.container_image = "registry.cn-hangzhou.aliyuncs.com/fentensoft/jupyterhub:1.3"