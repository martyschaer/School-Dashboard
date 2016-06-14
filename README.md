# SchoolDashboard [![Build Status](https://travis-ci.org/martyschaer/SchoolDashboard.svg?branch=master)](https://travis-ci.org/martyschaer/SchoolDashboard)
Project for Module 306.

demo

## Management
All project management documents can be found on [Google Drive](https://drive.google.com/drive/folders/0B817XkuekfgYS1luV2RRSHpVOG8).

The Scrum Trello board can be found [here](https://trello.com/b/Ol8jBTos/schoolproject).

## Technical
### Server management
The management console is reachable here on [DigitalOcean](https://cloud.digitalocean.com/droplets/10094949).

The Server can be accessed here: [46.101.226.85](http://46.101.226.85/)

## Documentation
### PHPdoc
Currently not compatible with php7.

### Library API-Docs
* [Bootstrap](http://getbootstrap.com/)
* [Font Awesome](https://fortawesome.github.io/Font-Awesome/)
* [Bootstrap 3 Datepicker](https://eonasdan.github.io/bootstrap-datetimepicker/)
* [Laravel](https://laravel.com/docs/5.2)

## System requirements
* An apache2-Webserver with PHP7
* MySQL or MariaDB database server
* [composer](https://getcomposer.org/)
* [npm](https://nodejs.org/)
* [bower](http://bower.io/)
* [gulp](http://gulpjs.com/)

## Installation
1. Clone the repository: `git clone https://github.com/martyschaer/SchoolProject`
2. Install composer dependencies: `composer install`
3. Install bower dependencies: `bower install`
4. Copy/rename .env.example to .env
5. Adjust settings in .env (Database- and mail-settings)
6. Create a laravel encryption key:`php artisan key:generate`
7. Migrate the databases `php artisan migrate:refresh --seed`
8. Install the dependencies for the frontend build system: `npm install`
9. Build the frontend assets: `gulp build`
10. Adding a cronjob (needed for reminders) `* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1`


make travis even greater again
