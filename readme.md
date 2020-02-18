# ProductImage 
A simple CRUD products with image upload application & User AUTH API
# Technologies
1. PHP Version 5.6.40
2. Mysql Database
3. Laravel Framework 5.4.36
# Getting started
1. `git clone https://github.com/Mostafa0220/ProductImage.git && cd todos`
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. Open .env file and change DB_DATABASE, DB_USERNAME and  DB_PASSWORD with yours
6. `php artisan migrate`
7. `php artisan passport:install`
8. `php artisan serve`

# Register API:
![Register API](http://mos-tafa.com/code_img/todos/register_api.png)

# Validation of Register API:
![Validation of register API](http://mos-tafa.com/code_img/todos/validation-of-register_api.png)

# Login API:
![Login API](http://mos-tafa.com/code_img/todos/login_api.png)

# User Details API:
In this api, you have to set two headers as listed below:
‘headers’ => [
‘Accept’ => ‘application/json’,
‘Authorization’ => ‘Bearer ‘.$accessToken,
]
So, make sure above header, otherwise, you can not get user details.
![User Details API](http://mos-tafa.com/code_img/todos/details_api.png)
# ProductImage
