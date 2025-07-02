## Equipment Reservation Management System(ERMS)

The Equipment Reservation Management System (ERMS) is a web platform that makes managing equipment rentals easier, allowing users to make reservations, return items, and track the status of their items in real time (maybe one day...)

## Execution Config

- Intall Laravel by the official guide ` https://laravel.com/docs/12.x#installing-php `
- Make sure that ` npm ` are installed
- Clone this repository
  
### In the project directory:
- Execute ` cp ./.env.example .env ` to copy the env file
- Execute ` composer install ` to resolve composer dependencies
- Execute ` php artisan key:generate ` to generate the application key
- Execute ` npm install && npm run build `
- Execute ` touch ./database/database.sqlite ` to create database file
- Execute ` php artisan migrate:fresh --seed ` to migrate and populate the database
- Then, execute ` composer run dev ` to run the project locally

### Observations

- There is some user already registered, you can access the aplication with ` fulano@example.com ` and ` 123456 ` credentials
- If you want to run the application without any data, run ` php artisan migrate:fresh ` instead of ` php artisan migrate:fresh --seed `
