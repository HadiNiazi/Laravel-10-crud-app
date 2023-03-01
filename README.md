Clone the Laravel app repository from GitHub to your local PC.
composer install
cp .env.example .env
php artisan key:generate
connect database and run php artisan migrate
php artisan serve
