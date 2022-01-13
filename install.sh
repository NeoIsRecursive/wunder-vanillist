#!/bin/bash

#make folders for avatar storage
mkdir -p storage/app/public/avatars
#make db file
touch database/database.sqlite
#make .env file with sqlite (very good no duplicates of anything ...)
cat .env.example | awk '{gsub("DB_.*","DB_CONNECTION=sqlite")}1' | xargs printf '%s\n' >> .env

#download all dependencies and install them.
composer update

php artisan key:generate

php artisan storage:link

php artisan migrate:fresh

npm install

npm run dev
