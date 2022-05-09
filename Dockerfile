FROM php:8.0-apache

COPY ./src/ /var/www/html
# COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN chown -R www-data:www-data /var/www/html


