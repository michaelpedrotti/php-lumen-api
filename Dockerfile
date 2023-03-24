FROM php:8.1.17-cli-alpine
WORKDIR /var/www/html
COPY ./composer.json ./composer.json
#COPY ./composer.phar ./composer.phar
RUN docker-php-ext-install pdo pdo_mysql
RUN apk update
RUN apk add composer
CMD composer install
#RUN php composer.phar install
CMD php -S 0.0.0.0:8000 app.php
EXPOSE 8000
# docker build -t pedrotti/php-cli .