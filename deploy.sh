#!/bin/bash
echo "Hold onto your butts"
composer install --no-dev --verbose --prefer-dist --optimize-autoloader --no-progress
npm install
#bower install
#bundle install
gulp --prod
