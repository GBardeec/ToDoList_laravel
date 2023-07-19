## Setup instructions
### Requirements
1. PHP ^7.4
2. NPM ^6.13
3. MySQL DB

#### Laravel
- `composer install`
- `cp .env.example .env`
- modify **.env**
    1. Set **APP_URL** to current URL
    2. Set **DB_***
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate`
- `php artisan db:seed`

#### MAMP
- Add in database.php to mysql section


#### Vue
- `npm i`
- `npm run [dev/prod/watch]`

`php artisan serve` or **nginx** setup

#### Other
- Register and set yourself as admin: set is_admin to 1 in users table

