<h1 align="center">ComicU</h1>

<p align="center">
<a href="https://github.com/farisfaikar/comicu"><img src="https://img.shields.io/github/stars/farisfaikar/comicu.svg?style=social" alt="Stars"><a>
<img src="https://komarev.com/ghpvc/?username=farisfaikar&repo=comicu&label=Repository%20views&comiculor=0e75b6&style=flat" alt="Repository Views">
</p>

# Description.

The application we developed is a comic inventory management application where the admin can manage the inventory of the library online. Admins can add, edit, and delete comic data contained in the application database.

# Features

Below are the features of this website.

## Client:

Clients can browse the list of comics in the application. Clients can register themselves into the application by signing in/registering manually or using Google SSO. After that, the client can borrow comics with a predetermined duration (maximum 1 week) and if the user fails to return the comic within the specified time period, the application will automatically calculate the fine imposed on the client. The client is not allowed to borrow comics if the fine has not been paid. If the client loses the comic, the client must pay compensation at the full price of the comic.

## Admin:

Admin can add, edit, and delete comic data in the database. Admin can add, edit, and delete category data in the database.

# Technology

The technology used to develop this application are as follows:

-   Fullstack: Laravel
-   Frontend: Tailwind CSS, Blade, DaisyUI
-   Database: MySQL
-   Authentication: Laravel/Breeze
-   VCS: Git, GitHub
-   VPS: [To be determined]
-   Collaborative: Eraser, Notion
-   Testing: PHPunit
-   Code Styling: Prettier

## Installation (For Developers)

ComicU Laravel Project Installation Tutorial:

1. Install PHP 8.2, XAMPP, Composer, Laravel 10.

2. Add the following extension to the php.ini file (usually found in C:\php\php.ini, depending on the PHP installation location). Write the following extension in the php.ini file then save:

```
extension=curl
extension=fileinfo
extension=openssl
extension=zip
extension=pdo_mysql ; for MySQL driver
extension=mbstring ; for seeder
extension=gd ; for image()
curl.cainfo="C:\xampp\php\extras\ssl\cacert.pem" ; for image(), first download the file cacert.pem
zend_extension=xdebug ; for unit and feature testing (if using windows xdebug installation can be through the following link: https://xdebug.org/wizard)
xdebug.mode=coverage ; for unit and feature testing
```

3. Copy and paste the .env-example file in the Laravel comicu project folder in the same folder, and change the file name to `.env`.

4. Create a new APP_KEY in the `.env` file by running `php artisan key:generate` in the Laravel comicu project folder.

5. Run `composer install` in the Laravel comicu project folder. (This step is the most likely to get an error. If it does, it means there was a problem adding the extension in step 2).

6. Create a new database manually in phpMyAdmin with the name `comicu`. Edit `DB_DATABASE=comicu` in the `.env` file.

7. Run `php artisan migrate:fresh --seed` to populate the database with data.

8. Run php artisan serve and try to open localhost link (http://127.0.0.1:8080).

9. The website is accessible.

## Default Credentials

-   Email: admin@mail.com
-   Password: password

## GitHub Workflow (Trunk Based Development)

1. Create a new branch (example branch name: faris.comic-crud)
2. Add changes to the code in that branch
3. Create a Pull Request
4. Pull Request is tested by GitHub Actions (build, test, deploy)
5. Pull Request merged repo owner (branch: main)

## Team Members
- Faris Faikar Razannafi

### Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
