#!/bin/bash

# Generate an OpenSSL RSA Keypair and copy it to the public directory

openssl genrsa -out private.pem 4096
openssl rsa -in private.pem -outform PEM -pubout -out public.pem
cp public.pem ../public/ssl
