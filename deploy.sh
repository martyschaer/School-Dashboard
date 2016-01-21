#!/bin/bash
echo "Starting deploy script: $(date +%Y-%m-%d %H:%M:%S)"

# Delete current contents of the html folder
rm -rf /var/www/html/*
cp /var/www/build.tar.gz /var/www/html
cd /var/www/html
tar -zxvf build.tar.gz
rm build.tar.gz
composer install
cp /var/www/.env /var/www/html