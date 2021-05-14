ARG PHP_VERSION=8.0.0

FROM php:fpm-alpine 


RUN apk update \
    && apk add  --no-cache \
    git \
    curl \
    icu-dev \
    libxml2-dev \
    g++ \
    make \
    autoconf \
    && docker-php-source extract \
    && docker-php-source delete \
    #&& docker-php-ext-install pdo_mysql soap intl zip \             //ACA VA POSTGRES
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
   
    && composer global require "phpunit/phpunit"

ENV PATH /root/.composer/vendor/bin:$PATH

RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit


WORKDIR /usr/src/app 
COPY . /usr/src/app

RUN composer install
 