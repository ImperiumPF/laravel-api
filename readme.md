# Imperium API and Backoffice
This is a Laravel [Laravel 5.6+](https://laravel.com/) based project.

## Database
This application uses InnoDB tables for foreign keys constraint support.
Since we are using laravel as a core, we support a different set of databases:
- [MySQL](https://www.mysql.com/)
- [PostgreSQL](https://www.postgresql.org/)
- [SQLite](https://www.sqlite.org/)
- [SQL Server](https://www.microsoft.com/sql-server/sql-server-2017)

## Dependencies
- [Socialite](https://github.com/laravel/socialite) - Allows us to provide social authentication
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) - JSON Web Token Authentication for laravel
- [laravelcollective/html](https://github.com/LaravelCollective/html) - HTML and Form Builders for the Laravel Framework

## Server Requirements
- [PHP >= 7.2](http://www.php.net/)
- [Composer](https://getcomposer.org/)

## Installation
Start by clonning the repository.
```bash
git clone https://github.com/ImperiumPF/laravel-api.git
```
Install dependencies
```bash
composer install
```
Create and edit the .env file
```bash
cp .env.example .env
nano .env
```
Generate the application and jwt keys
```bash
php artisan key:generate
php artisan jwt:generate
```
Do the migrations
```bash
php artisan migrate
```
Start the web server
```bash
php artisan serve
```

## Documentation
For the full documentation please refer to the [Wiki](https://github.com/ImperiumPF/laravel-api/wiki).

## Trying out Imperium
You can try our project on the [Imperium website](https://imperiumpf.me).

## Found a bug?
If you've found a bug and want to report it, simply open a issue here on GitHub. It will be analized and fixed by our trained monkeys.

## License
Our project is released and distributed under the [MIT license](https://github.com/ImperiumPF/laravel-api/blob/master/LICENSE). 

## Third Party Software
Imperium would not be possible without 
- [Laravel](https://laravel.com/) - The core of the project [MIT License]
- [AdminLTE](https://adminlte.io/) - The backend theme [MIT License]
- [Now UI Kit](https://www.creative-tim.com/product/now-ui-kit) - The frontend theme [MIT License]
- [Bootstrap](https://getbootstrap.com/) - The core of themes [MIT License]
- [jQuery](https://jquery.com/) - Javascript framework [MIT License]
