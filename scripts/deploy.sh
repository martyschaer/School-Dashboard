#!/bin/bash
cd /var/www/

mv /var/www/html/package.tgz /var/www/pagacke.tgz

tar -xzf package.tgz

rm package.tgz

cp /var/www/html/.env build/.env

rm -rf /var/www/old

mv /var/www/html /var/www/old
mv build /var/www/html