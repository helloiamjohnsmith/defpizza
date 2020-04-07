<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About
Application for ordering and delivery of pizza. The name is `Def Pizza`, which means `Definitely pizza`. Our slogan is 
`Pizza by default`. The application is developed based on `Laravel 7`, `Livewire`, `MySQL` (or `Maria DB`).
 The application is ready to use with `Vue.js`.

## Installation
First of all server must satisfy requirements of Laravel 7. Learn more about [Laravel requirements] 
(https://laravel.com/docs/7.x/installation#server-requirements). After that copy the repository:

`git clone https://github.com/helloiamjohnsmith/defpizza.git`

Next install all dependencies:

`composer install`

Check if `.env` is existed. If not existed, create this file. When all dependencies was installed generate application key:

`php artisan key:generate`
  
Configure database connection in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=<host_address>
DB_PORT=<port>
DB_DATABASE=<shema_name>
DB_USERNAME=<user_name>
DB_PASSWORD=<password>
```

Run migrations to create required tables:

`php artisan migrate`

At this point application is ready to run. 

## Seeding data
The application is ready for seeding data. For some tables (ingredients, pizza sizes) real data was used. 
But for most of tables `faker` was used. All pizza ingredients are real, but randomly generated for all pizzas. To seed 
pizza data run:

`php artisan db:seed`

Next run:

`php artisan pizza:type`

This will fill pizza types table.

both for testing and running in production mode with real data. Some models such as 
`Pizza ingredient` available only with real values. Models like ``Pizza`` available with prepared real data which 
automatically will be seeded in production mode. But there is ``Pizza factory`` for testing purposes.

## Additional information

### Database schema
Database schema available at `database/model/defpizza.mwb`, which requires `MySQL Workbench` to open.

### Architecture
The application principles suggest the possibility of ordering pizza both by the registered and guest users. If user 
is a guest then order information is stored in the session, but when user is logged in, the data is stored in the database. 
So if the user registers with the same email, all data on the history of orders becomes available.
For users, it is possible to eliminate unwanted ingredients.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
