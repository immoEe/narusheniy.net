FROM php:8.2-alpine

RUN apk add --no-cache \
    git \
    unzip \
    curl \
    nodejs \
    npm \
    bash \
    supervisor

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader

COPY package.json package-lock.json ./
RUN npm install

COPY . .

RUN composer dump-autoload --optimize

RUN chmod -R 777 storage bootstrap/cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]