# Coronatime

This Laravel project provides an interactive COVID-19 dashboard for users to view global and country-specific statistics. The dashboard requires user authentication, and users have the option to log in using either their email or username. New users can create an account by providing a username, email, and password. Email verification is required before users can log in. Users can reset their passwords through email verification. Upon login, users can view global COVID-19 statistics, including total new cases, deaths, and recoveries. They also can navigate to a separate page to view COVID-19 statistics by country. The data can be searched, sorted alphabetically, or sorted by the number of new cases, recoveries, or deaths.


## Table of contents
- [Prerequisites](#prerequisites)
- [Tech Stack](#tech-stack)
- [Getting Started](#getting-started)
- [Migrations](#migrations)
- [Development](#development)
- [Database diagram](#database-diagram)

## Prerequisites
- PHP@ 8.2.5
- MYSQL@ 8.0.32
- npm@9.5.0
- composer@2.6
- tailwind@3.3.1

## Tech stack
- [Laravel@10.x](https://laravel.com/docs/10.x) - Back-end framework
- [Spatie Translatable](https://github.com/spatie/laravel-translatable) - Package for translation
- [tailwindcss](https://tailwindcss.com/docs/installation) - CSS framework
- [tailwind-scrollbar](https://github.com/adoxography/tailwind-scrollbar) - Scrollbar Plugin for Tailwind CSS 

## Getting started

1.First of all, you need to clone repository    from GitHub:

```bash
  https://github.com/RedberryInternship/elene-javakhishvili-corona-time.git
```
2.Install dependencies:

```bash
composer install
```
3.After you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```bash
npm install
```

and also:

```bash
npm run dev
```

4.Now we need to set our env file. Go to the root of your project and execute this command.

```bash
cp .env.example .env
```

Update the .env file with your database credentials:

MYSQL:

>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****

Gmail SMTP:

>MAIL_DRIVER=smtp

>MAIL_HOST=smtp.gmail.com

>MAIL_PORT=465

>MAIL_USERNAME=*****

>MAIL_PASSWORD=*****

>MAIL_ENCRYPTION=ssl

>MAIL_FROM_NAME=*****

5.Generate a new application key

```bash
php artisan key:generate
```

## Migrations

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```bash
php artisan migrate
```

## Development

You can run Laravel's built-in development server by executing:

```bash
php artisan  serve
```
```bash
npm run  dev
```

## Database diagram

![diagram](https://i.ibb.co/4ZS2Zf1/draw-SQL-coronatime-export-2023-04-26.png)
See the [Diagram](https://drawsql.app/teams/elene/diagrams/coronatime)
