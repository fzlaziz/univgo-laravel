## About Univ Go Laravel

Backend Application for Univgo-Flutter

Usage : 
```
git clone https://github.com/fzlaziz/univgo-laravel.git
cd univgo-laravel
composer install

mv .env.example .env
//change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

php artisan key:generate
php artisan migrate --seed
php artisan serve

```