#!/bin/bash

#On error no such file entrypoint.sh, execute in terminal - dos2unix .docker\entrypoint.sh

composer install --optimize-autoloader --ignore-platform-reqs
chmod -R 775 ./vendor

ls -lah

php artisan key:generate
php artisan migrate --seed
php artisan cache:clear
php artisan config:clear
php artisan route:cache
php artisan view:cache

npm install
npm run dev

php-fpm
