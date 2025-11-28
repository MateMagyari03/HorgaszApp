FROM alpine:3.21

RUN apk add --no-cache \
    nginx \
    php82 php82-fpm php82-opcache \
    php82-mbstring php82-xml php82-pdo php82-pdo_mysql \
    php82-ctype php82-session php82-tokenizer php82-fileinfo \
    php82-curl php82-gd php82-zip; \
    ln -s /usr/bin/php82 /usr/bin/php || true; \
    mkdir -p /run/nginx /var/log/php-fpm /var/www/html/public /run/php-fpm;
COPY nginx.conf /etc/nginx/nginx.conf
COPY php-fpm-www.conf /etc/php82/php-fpm.d/www.conf
COPY entrypoint.sh /entrypoint.sh
COPY . /var/www/html
RUN chmod +x /entrypoint.sh

WORKDIR /var/www/html
EXPOSE 80
CMD ["/entrypoint.sh"]
