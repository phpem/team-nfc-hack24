#!/bin/bash
set -e

echo "Hold onto your butts"
composer install --no-dev --verbose --prefer-dist --optimize-autoloader --no-progress
php artisan cache:clear
#php artisan migrate --no-interaction

npm install
bower install --allow-root
bundle install
gulp setup
gulp --prod
chmod 777 storage
chmod 777 storage/logs