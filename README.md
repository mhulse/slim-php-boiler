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
$ bash <(curl -sL https://git.io/...)
```

### Install Composer

Install [Composer](https://getcomposer.org/):

```bash
$ curl -s http://getcomposer.org/installer | php
```

Official Composer installation instructions [found here](https://getcomposer.org/download/).

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
