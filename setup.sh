#!/bin/sh

# Author : Imam Sutono
# Copyright (c) imamsutono.tech

echo "Setup the project 🍳..."

echo "Installing composer packages..."
composer install

echo "Seeding database..."
php artisan db:seed

echo "Installing node dependencies..."
npm install
