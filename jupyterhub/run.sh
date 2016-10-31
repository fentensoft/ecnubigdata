#!/usr/bin/env bash

export BIGDATA_HOST="localhost:8000"   # website host
export BIGDATA_CLIENT_ID=4 # client_id
export BIGDATA_CLIENT_SECRET="p90JPxyusg8hH4hoskz5Is6ApOJrNFgyeIbQGKlE" # client_secret
export OAUTH_CALLBACK_URL="http://localhost:8888/hub/oauth_callback" # change the host to your jupyterhub host

jupyterhub --no-ssl --port 8888 -f $(dirname $0)/jupyterhub_config.py
