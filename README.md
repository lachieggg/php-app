lachiegrant.io
=
This is the web app source code for [my personal site](http://www.lachiegrant.io).

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

All passwords are stored as a hash in the database with a salt.

HTTPS redirection is enforced.

Base
=
To get started you will need both `composer` and `docker`

[Composer](https://getcomposer.org/) and [Docker](http://www.docker.com/).

Installation
=
Run:

`composer update`

`composer install`

`cp .env.sample .env`

`composer start`

Docker
=
This section will be updated with details for using [Docker](https://www.docker.com/) to run the application.

Configuration
=
You will need to edit `.env` to have your own settings for database connections.

For TLS/SSL, the keys and certs go in `docker/ssl/private` and `docker/ssl/certs` respectively.

You may also want to edit the `docker/nginx/config/nginx.website.conf` file to set the IP address to be your server IP.

Doing so will prevent direct IP access to your server which is recommended to prevent issues with SSL/TLS. 



License
=
This project uses the MIT license.
