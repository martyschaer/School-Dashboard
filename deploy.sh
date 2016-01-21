#!/bin/bash
echo "Starting deploy script: $(date +%Y-%m-%d.%H:%M:%S)"

echo "Extracting tar file"
rm -rf /var/www/html/
mkdir /var/www/html
mv /var/www/build.tar.gz /var/www/html
cd /var/www/html
tar -zxf build.tar.gz
rm build.tar.gz

echo "Composer install"
composer -n install

echo "Copying .env to /var/www/html"
cp /var/www/.env /var/www/html$

echo "Setting correct permissions"
chown -R www-data:www-data /var/www
chmod -R 775 /var/www/html/bootstrap/cache/ /var/www/html/storage
echo "=================================================="