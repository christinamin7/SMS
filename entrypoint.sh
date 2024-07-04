#!/bin/bash
set -e
 
# Optimize Laravel
#npm install 

#npm run dev

php artisan optimize
 
# Clear cache
php artisan cache:clear
 
php artisan migrate
 
php artisan db:seed
 
exec "$@"