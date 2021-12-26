#!/bin/bash

# Installs PHP8.0 and associated dependencies
# On Ubuntu 20.04

sudo add-apt-repository ppa:ondrej/php
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo apt install php8.0 -y
sudo apt install php8.0-mbstring -y
sudo apt install php8.0-xml -y
sudo apt install php8.0-curl -y
sudo apt install php8.0-mysql -y

