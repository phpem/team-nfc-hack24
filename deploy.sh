#!/bin/bash
set -e

echo "Hold onto your butts"
composer install --no-dev --verbose --prefer-dist --optimize-autoloader --no-progress
php artisan cache:clear
php artisan migrate --no-interaction
php artisan db:seed --no-interaction

npm install
bower install --no-interactive --allow-root
bundle install
gulp setup
gulp --prod
chmod 777 storage/*
chmod 666 storage/*/*
