#!/bin/bash
set -e

cd /var/www/html/
echo option: $1
if [ "$1" == "seed" ]; then
	echo seed
	php artisan migrate:fresh --force --seed
fi

if [ "$1" == "fresh" ]; then
	echo fresh
	php artisan migrate:fresh --force
fi

if [ "$1" == "migrate" ]; then
	echo migrate only
	php artisan migrate
fi
