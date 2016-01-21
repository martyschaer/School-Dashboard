#!/bin/bash
cd /var/www/html
echo "Branch: $1"
git clone https://github.com/martyschaer/SchoolProject --branch $1 .
composer install
cp /var/www/.env /var/www/html