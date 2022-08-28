FROM php:7.4-fpm
WORKDIR /code
RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install mysqli pdo pdo_mysql

CMD bash -c "php-fpm"