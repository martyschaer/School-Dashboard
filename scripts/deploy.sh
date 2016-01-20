#!bin/bash
cd `dirname $0`

tar -xzf package.tgz
rm package.tgz

cp .env build/.env

rm -rf /var/www/old
mv /var/www/html /var/www/old
mv build /var/www/html