# MeetEcho

## Team

-   [Joseph](https://github.com/JosephCrespin)
-   [Lorena](https://github.com/crimanlor)
-   [Quim](https://github.com/Joaquim-Frances)
-   [Vanessa](https://github.com/vanessacor)

## Demo

![Echomeet Demo](echomeetDemo.gif)

## Project Requirements

-   Web page for events management;
-   Homepage with events highlighted section;
-   Only register users can sign-up for the events;
-   Register users also can cancel the attendance;
-   Notifity users via email when they register in an event;
-   Only Admin Users can create, delete, update and change the highlight ones;
-   Admin can check wich users are registered in a event;
-   TDD
-   Web page should be deployed.

## Technologies

-   Frontend:[Bootstrap](https://getbootstrap.com/), [Sass](https://sass-lang.com/).
-   Backend: [Laravel](https://laravel.com/).
-   Databse: [MySQL](https://www.mysql.com/).

## Required

-   PHP 7.4
-   Composer

## Getting Started

-   instal all composer packages

    ```
    composer install
    ```

-   create a .env file

    ```
    cp .env.exampe .env
    ```

-   generate artisan key

    ```
    php artisan key:generate
    ```

-   install all npm packages

    ```
    npm install
    ```

## Run Tests

```
php artisan test
```
