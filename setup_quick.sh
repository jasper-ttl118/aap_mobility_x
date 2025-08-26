#!/bin/env bash
cp .env.example .env
# touch database/database.sqlite
composer clear-cache
composer install && npm install
# composer clear-cache
# composer update && npm update

php artisan key:generate
echo "Done. Run migration before starting application."
