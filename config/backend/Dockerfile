FROM php:8.0-apache

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git zip


RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD bash -c "composer install && php artisan serve --host 0.0.0.0 "
