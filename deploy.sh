#!/bin/bash
echo "Hold onto your butts"
composer install --no-dev --verbose --prefer-dist --optimize-autoloader --no-progress
npm install
bower install
bundle install
gulp setup
gulp --prod
chmod 777 storage
chmod 777 storage/logs
