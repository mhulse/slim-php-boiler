# Slim PHP Boiler

So I can get up-and-running with Slim quickly.

The project primarily utilizes [Composer](https://getcomposer.org/), [Slim](http://www.slimframework.com/) and [Twig](http://twig.sensiolabs.org/).

## Development process

Suggested development steps follow. Be sure to fully read instructions before modifying code.

```bash
$ cd project/directory/
```

Download the code from this repo:

```
$ bash <(curl -sL https://git.io/vXdz0)
```

### Install Composer

Install [Composer](https://getcomposer.org/):

```bash
$ curl -s http://getcomposer.org/installer | php
```

Official Composer installation instructions [found here](https://getcomposer.org/download/).

### Install application dependencies

Get the composer-installable code:

```bash
$ php composer.phar install
```

If/when needed, update Composer dependencies using:

```bash
$ php composer.phar update
```

**WARNING:** You should **never** run `composer update` on the production machine!

> [after] deploy[ing] your updated `composer.lock`, [you should] then re-run `composer install`. You should never run `composer update` in production. If however you deploy a new `composer.lock` with new dependencies and/or versions (after having run `composer update` in dev) [you can] then run `composer install` [and] Composer will update and install your new dependencies [onto the production machine’s deployment].  
> – [“composer update” vs “composer install”](http://adamcod.es/2013/03/07/composer-install-vs-composer-update.html)

Uninstall Composer dependencies using:

```bash
php composer.phar remove "slim/views"
```

… where `"slim/views"` is the package name you want to uninstall.

### Run development server

```
$ php composer.phar start
```

… and visit <0.0.0.0:8080>.

## Links

* [Composer Dependency Manager for PHP]()
* [Slim PHP micro framework](http://www.slimframework.com/)
* [TWIG The flexible, fast, and secure template engine for PHP](http://twig.sensiolabs.org/)
* [Authentication with Slim 3: Setting up Slim (1/29)](https://youtu.be/RhcQXFeor9g)
