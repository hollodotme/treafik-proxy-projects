FROM php:7.3-fpm-alpine
ENV PHPREDIS_VERSION 4.3.0
ENV XDEBUG_VERSION 2.7.1
# Update system
RUN apk update && apk upgrade && apk add --no-cache ${PHPIZE_DEPS} procps \
    && pecl install xdebug-${XDEBUG_VERSION} \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache pdo_mysql
# Install redis extension
RUN mkdir -p /usr/src/php/ext/redis \
   && curl -L https://github.com/phpredis/phpredis/archive/${PHPREDIS_VERSION}.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
   && echo 'redis' >> /usr/src/php-available-exts \
   && docker-php-ext-install redis
# Cleanup
RUN apk del ${PHPIZE_DEPS} \
    && rm -rf /var/cache/apk/*
WORKDIR /app
