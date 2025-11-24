# Stage 1: Composer Install
FROM composer:2 AS composer_stage

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --no-scripts --prefer-dist

# Stage 2: NPM Install
FROM node:16 AS npm_stage

WORKDIR /var/www/html

COPY --from=composer_stage /var/www/html .

RUN npm install --legacy-peer-deps

# Stage 3: PHP-FPM + Production Build
FROM php:8.2.29-fpm-trixie AS fpm_stage

WORKDIR /var/www/html

# Install PHP dependencies and Nginx
RUN apt-get update && apt-get install -y \
    bash \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    nginx \
    && rm -rf /var/lib/apt/lists/*

# Copy the app files (from previous stage)
COPY --from=composer_stage /var/www/html .

# Copy npm files and build frontend assets
COPY --from=npm_stage /var/www/html .

# Copy Nginx configuration
COPY ./nginx.conf /etc/nginx/nginx.conf

# Ensure the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose the ports for Nginx and PHP-FPM
EXPOSE 80 443 9000

# Start both Nginx and PHP-FPM
CMD service nginx start && php-fpm