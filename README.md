# StaffAny Test
## How To Running It Locally
First copying this repository with one of these ways:
- Clone using `git clone https://github.com/shilohchis/staffany.git`
- Or using download ZIP button from this github page, extract on your computer    

Then from your terminal, change directory to where you clone the repo after that run `composer install`
Make sure your **PHP version at least 7.3**, or install **laravel homestead (please refer to laravel docs for installation)**  The repo have file `.env.example` from the root, copy it and name `.env`, then change:
```
APP_NAME
APP_URL
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```
You can change the `.env` as you need like change the database service, port etc
If dependencies installed smoothly, you can run the project with command `php artisan serve` or if you use homestead (refer to docs)

### Seeding Data

After you can run locally, try acess `/login`, the url you can see from the `APP_URL` you set on `.env` file
Now before trying the login, we need to seeding the user, run `php artisan db:seed`
I created one account for test with credentials:
```
username: test@example.com
password: test12345
```
After you successfully login, you'll see timeline chart

### Add / Update Shift
You can add / update shift from sidebar menu and click **List** under section **Shifts**
