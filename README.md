<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Introduction

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Requirements
============
- PHP 8.0
- MySQL 5.7 or 8

## Installation

Clone the repo locally:
```
git clone https://github.com/ShwePhueHmone/Laravel_E_Commerce.git
```

`cd` into cloned directory and install dependencies. run below command one by one.

Install dependencies:
```
composer install
```
If you have downloaded the zip file, you will get the .env.example file. Just make a copy of that file as .env
```
cp .env.example .env
```
and also set all the .env variable as mentioned above. Once the variables have been set, generate the application key
```
php artisan key:generate
```
To create the symbolic link, 
```
php artisan storage:link
```

### Configuration in `.env` file

Database **eg.**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Google ID and Secret Key
```
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```
Create Google ID in following link:
> https://console.cloud.google.com/apis/dashboard 
<br>
### Database Migration

Run database migrations:
```
php artisan migrate
```

**(Optional)** If you want to get dummy data, run this:
```
php artisan db:seed --class=DatabaseSeeder
```
## Server Run

Run the dev server:
```
php artisan serve
```

Visit below url:
```
http://localhost:8000
```

