# The Bookaholics
A web app where users can keep their collection of books and borrow books from others with a book review system.
05/2019 | Sylhet, Bangladesh

## Set Up

1. Clone repository

- `git clone https://github.com/demyansson/Book-Sharing-Laravel.git`
- `cd Book-Sharing-Laravel/`

2. Install dependencies

- `composer install` (Make sure you have PHP7.2 or higher and you have installed all the necessary PHP extensions)

3. Initialize environment

- `cp .env.example .env`
- `php artisan key:generate`

4. Enter the data for connecting to the database and data for sending e-mail

- `nano .env`

5. Migrate database

- `php artisan migrate --seed` (You can remove the --seed flag if you do not want to have samples of users, books, and authors.)

6. Start application

- `php artisan serve`

After that, you can open http://127.0.0.1:8000 from your browser and enjoy!

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)
