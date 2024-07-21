#!/bin/sh
sed -i -e 's/$PORT/'"$PORT"'/g' /etc/nginx/nginx.conf
php-fpm -D
nginx -g 'daemon off;'