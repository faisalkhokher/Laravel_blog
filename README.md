Wellcome to my Project 

First create 
.env & paste the same as .env.example code , then replace this code... 

LOG_CHANNEL=stack
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=

Second is export Db file .sql

Then run command 
composer install --ignore-platform-reqs

End Run Migrations 
php artisan migrate 

Thats it :)
