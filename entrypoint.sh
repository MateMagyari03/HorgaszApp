#!/bin/sh
set -e

mkdir -p /run/nginx /var/log/nginx /var/log/php-fpm

if [ -f /run/secrets/app_key ]; then
    export APP_KEY=$(cat /run/secrets/app_key)
else
    echo "App Key does not exist or is not readable"
fi

if [ -f /run/secrets/mail_password ]; then
    export MAIL_PASSWORD=$(cat /run/secrets/mail_password)
else
    echo "Mail Password does not exist or is not readable"
fi
test \"$(stat -c '%U:%G' /var/www/html/storage/app/public 2>/dev/null)\" = 'nginx:nginx' || chown -R nginx:nginx /var/www/html/storage/app/public
    
php-fpm82 -F &

php /var/www/html/artisan down
php /var/www/html/artisan storage:link
php /var/www/html/artisan migrate --force
#php /var/www/html/artisan migrate --force --fresh
php /var/www/html/artisan seed:if-empty --force

php /var/www/html/artisan up

exec nginx -g "daemon off;"
