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

### Database

```sql
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

## Tips

Random development tips and info …

### Autoload app files

When a new file is created in the [`app/`](app/) directory, for example, it should be automatically loaded into our app.

This functionality is handled via [`composer.json`](composer.json) using the `psr-4` “autoloading” setting, which is just a convention for namespacing.

```json
"App\\": "app"
```

… where:

1. `App` could be any name/identifier you want
1. `\\` is just a json-escaped backslash
1. `"app"` is the name of the directory we want to autoload files from

Now every new file is autoloaded in based on the namespace.

This will dump the autoload file:

```bash
$ php composer.phar dump-autoload -o
Generating optimized autoload files
```

### Rules and exceptions

We are using the [Respect library](https://github.com/Respect/Validation) for validation.

Respect lets us create custom validation “rules”, like checking if a user’s email already exists in the system.

For example, in `App\Controllers\Auth\AuthController`, we have:

```php
'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
```

… where `emailAvailable` is a custom rule defined in `App\Validation\Rules`.

When you need to add a new validation rule, follow these steps:

1. Create a new rule in `App\Validation\Rules`
1. Create a new related rule exception in `App\Validation\Exceptions`
1. Apply rule to controller logic

## Links

* [Composer Dependency Manager for PHP]()
* [Slim PHP micro framework](http://www.slimframework.com/)
* [TWIG The flexible, fast, and secure template engine for PHP](http://twig.sensiolabs.org/)
* [Authentication with Slim 3 (29 videos)](https://www.youtube.com/watch?v=RhcQXFeor9g&list=PLfdtiltiRHWGc_yY90XRdq6mRww042aEC)
