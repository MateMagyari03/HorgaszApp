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
FROM php:8.1-fpm-alpine AS fpm_stage

WORKDIR /var/www/html

# Install PHP dependencies
RUN apk add --no-cache \
    bash \
    libpng \
    libjpeg-turbo \
    freetype \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev

# Copy the app files (from previous stage)
COPY --from=composer_stage /var/www/html .

# Copy npm files and build frontend assets
COPY --from=npm_stage /var/www/html .

# Ensure the correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose the port that Traefik will route to
EXPOSE 9000

# Automatically run migrations on container start
CMD php artisan migrate --force && php-fpm