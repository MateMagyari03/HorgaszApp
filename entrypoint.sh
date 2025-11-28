#!/bin/sh
set -e

mkdir -p /run/nginx /var/log/nginx /var/log/php-fpm # Ha nem léteznéánek

php-fpm82 -F &

exec nginx -g "daemon off;"
