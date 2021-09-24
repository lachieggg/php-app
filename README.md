lachiegrant.io
=

This is the API source code for [my personal site](http://www.lachiegrant.io).

The API uses the [Slim](https://www.slimframework.com/) micro framework. 

[Eloquent](https://laravel.com/docs/8.x/eloquent) is used as an ORM. 

[Respect Validation](https://github.com/Respect/Validation) is used as a validation engine.

This repository is a full stack application, a combination of PHP and JavaScript.

The database driver is [MySQL](https://www.mysql.com/).

[Docker](https://www.docker.com) is the simplest way to run the application in local and production environments.

Security
=
Currently there is CSRF and XSS protection implemented.

MySQL injection protection is also built in.

Base:
=
To get started you will need both `composer` and `docker`

[Composer](https://getcomposer.org/) and [Docker](http://www.docker.com/).

Installation:
=
Run:

`composer update` 

`composer install` 

`cp .env.sample .env`

`composer start`

Docker:
=
This section will be updated with details for using [Docker](https://www.docker.com/) to run the application.

Configuration:
=
You may need to edit `bootstrap/app.php` and add your own database settings there.

For TLS/SSL, the keys and certs go in `docker/ssl/private` and `docker/ssl/certs` respectively.
