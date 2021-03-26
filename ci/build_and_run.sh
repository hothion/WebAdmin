#!/bin/bash

#set -e
echo build docker container
docker-compose build
echo run docker container
docker-compose up -d
