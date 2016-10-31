#!/usr/bin/env bash
export BIGDATA_HOST="test.com"
export BIGDATA_CLIENT_ID=4
export BIGDATA_CLIENT_SECRET="p90JPxyusg8hH4hoskz5Is6ApOJrNFgyeIbQGKlE"
export OAUTH_CALLBACK_URL="http://localhost:8888/hub/oauth_callback"
jupyterhub --no-ssl --port 8888 -f $(dirname $0)/jupyterhub_config.py
