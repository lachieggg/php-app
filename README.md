# README

This is the source code for [my personal site](http://www.lachiegrant.io).

It uses [Laravel](https://laravel.com/) as a router, and [Slim](https://www.slimframework.com/) for authentication. [Respect Validation](https://github.com/Respect/Validation) is also utilized.

This repository is a full stack application, a combination of PHP and JavaScript.

The database driver is [MySQL](https://www.mysql.com/).

Currently the application can be run using [Apache](http://www.apache.org/) and [Composer](https://getcomposer.org/).

[Docker](https://www.docker.com) will be added as the default way to run the application in future.

Security
=
Currently there is CSRF and XSS protection implemented.

MySQL injection protection is also built in.

Base:
=
To get started you will need both `composer` and `apache`.

[Composer](https://getcomposer.org/) and [Apache](http://www.apache.org/).

Installation:
=
`composer update` 

`composer install` 

Docker:
=
This section will soon be updated with details for using [Docker](https://www.docker.com/) to run the application.

Configuration:
=
You will need to edit `bootstrap/app.php` and add your own database settings there.
