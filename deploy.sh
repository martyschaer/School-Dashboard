#!/bin/bash
#Change to the html directory and clone the repository
cd /var/www/html
git clone https://github.com/martyschaer/SchoolProject --branch $1 .
composer install
cp /var/www/.env /var/www/html