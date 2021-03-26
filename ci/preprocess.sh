#!/bin/bash

#set -e

ROOT_DIR=$(git rev-parse --show-toplevel)
SOURCE_DIR=${ROOT_DIR}
cd ${SOURCE_DIR}

#preprocess config files
cp -f ${SOURCE_DIR}/.env.template ${SOURCE_DIR}/.env

echo "Replacing secret info..."

#app configuaration
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__APP_ENV__,${APP_ENV},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__APP_KEY__,${APP_KEY},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__APP_DEBUG__,${APP_DEBUG},g

#database config
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__DB_HOST__,${DB_HOST},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__DB_PORT__,${DB_PORT},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__DB_DATABASE__,${DB_DATABASE},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__DB_USERNAME__,${DB_USERNAME},g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__DB_PASSWORD__,${DB_PASSWORD},g

#mail configuaration
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s/__MAIL_HOST__/${MAIL_HOST}/g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s/__MAIL_PORT__/${MAIL_PORT}/g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s/__MAIL_USERNAME__/${MAIL_USERNAME}/g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s/__MAIL_PASSWORD__/${MAIL_PASSWORD}/g
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s/__MAIL_ENCRYPTION__/${MAIL_ENCRYPTION}/g

#hosts config
find ${SOURCE_DIR}/.env -type f -name "*" | xargs sed -i'' s,__GIFS_API_HOST__,${GIFS_API_HOST},g


#preprocess docker config
cp -f ${ROOT_DIR}/docker-compose.yml.template ${ROOT_DIR}/docker-compose.yml
find ${ROOT_DIR}/docker-compose.yml -type f -name "*" | xargs sed -i'' s/__GIFS_PORT__/${GIFS_PORT}/g
find ${ROOT_DIR}/docker-compose.yml -type f -name "*" | xargs sed -i'' s/__MIGRATION__/${MIGRATION}/g

echo "Preprocess Done."
