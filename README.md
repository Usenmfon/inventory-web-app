# Inventory Management Web Application

> Creating, managing resources, and assigning roles

This project runs with Laravel version 10.10.

## Getting started

Clone the repository

    git clone https://github.com/Usenmfon/inventory-web-app.git

Switch to the repo folder

    cd inventory-web-app


Assuming you've already installed on your machine: PHP (>= 7.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

#Generate Laravel permissions
php artisan permission:create-permission-routes

#Seed default user (admin)
php artisan db:seed --class=CreateAdminUserSeeder

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run prod
```

Then launch the server:

``` bash
php artisan serve
```

The Laravel project is now up and running! Access it at http://127.0.0.1:8000.

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
