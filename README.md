
## About Project Setup Commands

Please run the following commands to setup the project
- composer install
- npm install
- npm run dev
- php artisan migrate

Note: No need to rum these into the application as I provided zip with all the vendor folders + DB.

## How to setup
- The project is in Laravel 7, so the local PHP and server needs to be compatible with all the dependencies for Laravel 7
- Please setup the .env DB credentials as per the credentials and change the following keys

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prasadlaravelpractical
DB_USERNAME=root
DB_PASSWORD=password"
```
- Run command: php artisan server
- you can see a link: http://127.0.0.1:8000/
- please run the link on browser, you'll be able to run the project

## How to check functionality

- Please register a users first, If you are using linux ubuntu, then you'll need to give proper writable permission to below directories:
 1. public/uploads
 2. storage
 
- After registration, user can login and check the functionality.
- For API purpose, I've used Laravel Passsport for security reason, so that API will be secure.
- On the browser, logged in user can see the total hitting count of the "details" api which are called on the postman.
- To check the api, user first need to call the login api "http://127.0.0.1:8000/api/login" from postman, request paremeter should be "email" and "password", also add "Accept" paramter as "application/json" in Header section. By calling this api you'll get an "toekn" in response, which we are going to use for "details" api.
- Now you can call "http://127.0.0.1:8000/api/details". this is a GET api with two headers parameters, "Accept": application/json and the second is "Authorization": Bearer [Token received in login api], By this you'll get an response, also one api hit counter will be added into thr DB, which you can see on browser dashboard.
