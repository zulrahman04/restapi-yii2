## Requirement
PHP 8.1
composer 2.5.5

## Getting Started
clone this is repository

## installasi
run : Composer install & Composer update

## Setting DB
config/db.php
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=<YOUR DB>',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];

# migrations
run : php yii migrate 

# endpoint
view list
- index.php?r=profile/get-profile, method : GET
  
create
- index.php?r=profile/create-profile, method : POST
    name         > string;
    email        > email;
    phone_number > integer;
    address      > string;
  
Update
- index.php?r=profile/create-profile, method : POST
    id           > integer;
    name         > string;
    email        > email;
    phone_number > integer;
    address      > string;
  
delete
- index.php?r=profile/delete-profile, method : POST
    id         > integer
