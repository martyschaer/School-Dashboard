#!/bin/bash
mv /var/www/html/package.tgz /var/www/package.tgz

tar -xzf package.tgz

rm package.tgz

#cp /var/www/html/.env build/.env

rm -rf /var/www/old

mv -R /var/www/html /var/www/old
mv -R build  /var/www/html