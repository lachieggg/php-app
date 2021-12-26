#!/bin/bash

# Generates a certificate signing request along with a private key
# This is used by the domain registrar to generate a digital certificate that
# gives your site cryptographic legitimacy
#
# Once generated, you should upload the csr number to the domain registrar
#

source ../.env
openssl req -new -newkey rsa:4096 -nodes -keyout $DOMAIN_NAME.key -out $DOMAIN_NAME.csr
cat $DOMAIN_NAME.csr

