FROM php:8.2-cli

WORKDIR /app

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

COPY . /app

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/app"]