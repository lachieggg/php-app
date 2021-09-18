#!/bin/bash

############################################
composer update
composer install
docker build -t app
docker build -t webserver
docker build -t database
docker-compose up webserver database app
############################################
