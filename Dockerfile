
FROM alpine:3.21

RUN apk add --no-cache \
    nginx \
    php82 php82-common icu-data-full php82-openssl  \
    php82-json php82-fpm php82-opcache  \
    php82-mbstring php82-xml php82-dom  \
    php82-pdo php82-pgsql php82-pdo_pgsql php82-posix  \
    php82-ctype php82-session php82-tokenizer  \
    php82-fileinfo php82-phar php82-curl  \
    php82-zip php82-simplexml  \
    php82-iconv php82-redis php82-bcmath \
    php82-gd php82-exif php82-intl \
    php82-mysql php82-pdo_mysql; \
    ln -s /usr/bin/php82 /usr/bin/php
RUN mkdir -p /run/nginx /var/log/php-fpm /run/php-fpm

COPY nginx.conf /etc/nginx/nginx.conf

COPY php-fpm-www.conf /etc/php82/php-fpm.d/www.conf

COPY entrypoint.sh /entrypoint.sh

COPY . /var/www/html

COPY production.env /var/www/html/.env

RUN mkdir -p /var/www/html/public

RUN chown -R nginx:nginx /var/www/html && chmod -R 755 /var/www/html

RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80

CMD ["/entrypoint.sh"]