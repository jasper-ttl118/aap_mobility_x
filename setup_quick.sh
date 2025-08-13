#!/bin/env bash
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
composer clear-cache
composer install && npm install
composer clear-cache
composer update && npm update

echo "Done. Run migration before starting application."
