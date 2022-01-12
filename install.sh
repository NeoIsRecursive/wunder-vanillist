#!/bin/bash

mkdir storage/app/public/avatars
touch database/database.sqlite
cat .env.example | awk '{sub("DB_.*","DB_CONNECTION=sqlite")}1' | xargs printf '%s\n' >> .env

php artisan key:generate

composer update

php artisan storage:link

php artisan migrate:fresh

npm run dev
