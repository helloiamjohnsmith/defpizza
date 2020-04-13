#Def pizza

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

At this point application is ready to run. But for testing purposes it requires data seeding. 

## Seeding data
The application is ready for seeding data. For some tables (ingredients, pizza sizes) real data was used. 
But for most of the tables `faker` was used. All pizza ingredients are real, but randomly generated for all pizzas. To seed 
pizza data run:

`php artisan db:seed`

Next run:

`php artisan pizza:type`

This will fill pizza types table.

## Additional information

### Database schema
Database schema available at `database/model/defpizza.mwb`, which requires `MySQL Workbench` to open.

### Short functionality description
The application principles suggest the possibility of ordering pizza both by the registered and guest users. If user 
is a guest then all order information stored in the database and becomes available after registration. 
User can choose between available pizza sizes. All information changes on the fly.
