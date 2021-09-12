#!/bin/bash

############################################
composer install
#docker system prune -a
#docker build -t app -f Dockerfile.application .
docker build -t app -f Dockerfile.database .
#docker-compose up laravel-app database
docker-compose up database
############################################
