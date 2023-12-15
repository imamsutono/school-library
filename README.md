<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## School Library

This project is for test purposes. The main goal is to help the admin manage books, authors, and users of the school library.

## Features

- Add new user
- Manage authors (CRUD)
- Manage books (CRUD)

## How to Setup
1. Clone this repo<br>
Run `git clone https://github.com/imamsutono/school-library.git`
2. Move to the project directory<br>
Run `cd school-library`
3. Install composer packages<br>
Run `composer install`
4. Create the MySQL Database
5. Adjust the database configuration in `.env` file:
    - `DB_DATABASE`: fill with the database name.
    - `DB_USERNAME`: fill with the database username connection.
    - `DB_PASSWORD`: fill with the database user password.
6. Generate the database tables and columns
Run `php artisan migrate`
7. Fill database with dummy data.<br>
Run `php artisan db:seed`
8.  Install node dependencies
Run `npm install`
9. Run vite with `npm run dev` command
10. Run `php artisan serve` to run the application.
11. Hit the endpoints. e.g: http://localhost:8000/

## Supporting document

[Product Requirement Document](https://docs.google.com/document/d/1AbtKjmu4EqPucGMcHd8brE9v4O4qU0IIK6KSZYhFvFU/edit?usp=sharing).
