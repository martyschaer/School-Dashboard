# School-Dashboard [![Build Status](https://travis-ci.com/martyschaer/SchoolProject.svg?token=sbSe1s25snCdas4kvx7G&branch=master)](https://travis-ci.com/martyschaer/SchoolProject)
Project for module 306

# Ideas
## Technology
- Web
	- Bootstrap
	- Laravel
	- PHP 7.0.2
	- Digital Ocean
	- Travis-CI
	- Git @ Github
	- Trello
	- Google Drive
	- MySQL
	- Apache

## Ideas
- School Manager
	- Grades
	- Homework
	- Tests
	- Reminders
	- Todo lists (sub tasks)
	- timetable (location, teacher)

## Management
All project management documents can be found on [Google Drive](https://drive.google.com/drive/folders/0B817XkuekfgYS1luV2RRSHpVOG8).

The Scrum Trello board can be found [here](https://trello.com/b/Ol8jBTos/schoolproject).

## Technical
### Server management
The management console is reachable here on [DigitalOcean](https://cloud.digitalocean.com/droplets/10094949).

The Server can be accessed here: [46.101.226.85](http://46.101.226.85/)

## Documentation
### PHPdoc
Link to PHPdoc here.

### Library API-Docs
* [Bootstrap](http://getbootstrap.com/)
* [Font Awesome](https://fortawesome.github.io/Font-Awesome/)
* [Bootstrap 3 Datepicker](https://eonasdan.github.io/bootstrap-datetimepicker/)
* [Laravel](https://laravel.com/docs/5.2)

## Requirements
* composer
* bower
* gulp
* A webserver running PHP7 and MySQL including cronjob support (for reminders)

## Installation
1. Clone the repository: `git clone https://github.com/martyschaer/SchoolProject`
2. Install composer dependencies: `composer install`
3. Install bower dependencies: `bower install`
4. Copy .env.example to .env
5. Adjust settings in .env (database, mail etc.)
6. Create a laravel encryption key: `php artisan key:generate`
7. Migrate the databases: `php artisan migrate:refresh --seed`
8. Install the dependencies for the frontend build system: `npm install`
9. Build the frontend assets: `gulp build`
10. Adding a cronjob for the checking of reminders (* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1)
