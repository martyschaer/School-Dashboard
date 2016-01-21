#!/bin/bash
echo "Starting deploy script: $(date +%Y-%m-%d.%H:%M:%S)"
cd /var/www/html
echo "Checking out branch: $1"
git clone https://github.com/martyschaer/SchoolProject --branch $1 .
echo "Finished git cloning; Starting composer"
composer install
echo "Composer finished; Copying .env file"
cp /var/www/.env /var/www/html