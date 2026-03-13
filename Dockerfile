FROM php:8.2-cli

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libicu-dev \
    libsqlite3-dev \
    nodejs \
    npm

RUN docker-php-ext-install zip intl pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

RUN npm install
RUN npm run build

RUN touch database/database.sqlite

EXPOSE 10000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000