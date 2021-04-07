# Code for Hungary backend

Laravel based RESTful API for C4HU.

## Installation

```
git clone https://github.com/Code-for-Hungary/C4HU-backend.git
cd C4HU-backend
cp .env.example .env
// setup your db connection in .env
composer install
php artisan key:generate
php artisan migrate --seed
```

## Update
```
git pull
composer install
php artisan migrate --force
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan queue:restart
```
