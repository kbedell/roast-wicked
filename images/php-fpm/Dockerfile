FROM php:7.1-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --update --no-cache \
        automake \
        bash \
        $PHPIZE_DEPS \
        icu \
        jpeg-dev \
        libintl \
        libmcrypt-dev \
        libpng-dev \
        mysql-client \
        nodejs \
        zlib-dev \
    && pecl channel-update pecl.php.net \
    && pecl install -f mcrypt redis \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr/include --with-png-dir=/usr/include \
    && docker-php-ext-install -j"$(getconf _NPROCESSORS_ONLN)" gd opcache pdo_mysql zip \
    && echo "extension=mcrypt.so" > /usr/local/etc/php/conf.d/mcrypt.ini \
    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
    && npm i npm@latest -g

ENV APP_DIR /var/www/html

ADD build-scripts /build-scripts

RUN find /build-scripts -type f -exec chmod +x {} \; \
    && /build-scripts/install_composer.sh

# Allow customizing some composer flags
ONBUILD ARG COMPOSER_FLAGS='--no-scripts --no-dev --prefer-dist'
ONBUILD ENV COMPOSER_FLAGS=${COMPOSER_FLAGS}

# Allow installing and enabling xdebug
ONBUILD ARG ENABLE_XDEBUG='false'
ONBUILD ENV ENABLE_XDEBUG=${ENABLE_XDEBUG}

# Allow enabling of opcache
ONBUILD ARG ENABLE_OPCACHE='false'
ONBUILD ENV ENABLE_OPCACHE=${ENABLE_OPCACHE}

# Copy the application and change owner
ONBUILD WORKDIR ${APP_DIR}
ONBUILD COPY . ${APP_DIR}
ONBUILD RUN /build-scripts/composer.sh
ONBUILD RUN chown -R www-data:www-data ${APP_DIR}

CMD ["php-fpm"]