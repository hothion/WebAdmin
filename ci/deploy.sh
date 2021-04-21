#!/bin/bash

# set e

SERVER_SSH=$1
DEPLOY_PATH=$2


ROOT_DIR=$(git rev-parse --show-toplevel)
cd ${ROOT_DIR}

#syn source to deploy server
echo syn source to server
rsync -avzh --omit-dir-times --exclude '.git' ./ ${SERVER_SSH}:${DEPLOY_PATH}
echo deploying finished.