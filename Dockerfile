FROM dunglas/frankenphp

ENV SERVER_NAME=app.url

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    libssl-dev \
    unzip \
    && docker-php-ext-install \
    zip \
    intl \
    pdo \
    pdo_pgsql \
    pgsql \
    pcntl \
    sockets && \
    apt-get clean

WORKDIR /app

COPY . /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 8000 443

ENTRYPOINT ["php", "artisan", "octane:start", "--server=frankenphp", "--host=0.0.0.0"]
