#!/bin/bash

# clone the newest version
cd /var/www/html
logDir=/var/www/log
echo "$PWD" >> $logDir/deploy.log
echo "Branch: $1" >> $logDir/deploy.log
git clone https://github.com/martyschaer/SchoolProject --branch $1 . >> $logDir/deploy.log
composer install >> $logDir/deploy.log
cp /var/www/.env /var/www/html >> $logDir/deploy.log