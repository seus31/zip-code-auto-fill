FROM php:8.3-cli-alpine

RUN apk add --no-cache \
        git \
        unzip \
        libzip-dev \
        sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /work

CMD ["tail", "-f", "/dev/null"]
