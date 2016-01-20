#!/bin/bash

# clone the newest version
cd /var/www/html
git clone https://github.com/martyschaer/SchoolProject --branch $1 .
composer install
cp /var/www/.env /var/www/html