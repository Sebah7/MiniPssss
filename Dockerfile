FROM php:8.1.0RC2-apache
RUN docker-php-ext-install pdo_mysql