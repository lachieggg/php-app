lachiegrant.io
=
This is the web app source code for [my personal site](http://www.lachiegrant.io).

This repository is a full stack application, a combination of PHP and JavaScript.

[Slim](https://www.slimframework.com/) is used as a PHP micro framework.

[Eloquent](https://laravel.com/docs/8.x/eloquent) is used as an ORM.

[Respect Validation](https://respect-validation.readthedocs.io/en/latest/) is used as a validation engine.

[Twig](https://twig.symfony.com/) is used as a template engine.

[Phinx](https://book.cakephp.org/phinx/0/en/index.html) is used for migrations.

[MySQL](https://www.mysql.com/) is the database driver.

[Docker](https://www.docker.com) is the simplest way to run this application.

[npm](https://www.npmjs.com/) is used as a front end package manager.

[Webpack](https://webpack.js.org/) is used for bundling the JavaScript. 

Security
=
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

`composer migrate`

`npm install`

`npm run build`

Docker
=
To run with Docker, all you need to do is run `composer start` while the Docker daemon is running.

Configuration
=
You will need to edit `.env` to have your own settings for database connections.

For SSL/TLS, the keys and certs go in `docker/nginx/tls/private` and `docker/nginx/tls/certs` respectively.

You can utilize the `scripts/` directory for installing necessary dependencies for [Ubuntu](https://ubuntu.com/).

You may also want to edit the `docker/nginx/config/nginx.website.conf` file to set the IP address to be your server IP.

You should also edit the `nginx` config discussed above to enter your server domain name.

The custom JavaScript files are stored in `js`. Some output source files will be generated by `npm`. Those are stored in `public/js/autogenerated`.

License
=
This project uses the MIT license.
