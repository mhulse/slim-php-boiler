# Slim PHP Boiler

**So I can get up-and-running with Slim quickly.**

The code in this repository is heavily based on, and inspired by, [Authentication with Slim 3](https://www.youtube.com/watch?v=RhcQXFeor9g&list=PLfdtiltiRHWGc_yY90XRdq6mRww042aEC) by [@codecourse](https://github.com/codecourse).

## Development process

Suggested development steps follow. Be sure to fully read instructions before modifying code.

### Project directory

Create a git repository:

```bash
$ cd dev/
$ git init repo-name && cd repo-name
```

Optionally, install my boilerplate dotfiles:

```bash
$ curl -#L https://github.com/mhulse/gh-boiler/tarball/master | tar -xzv --strip-components 1 --include=*/{.editorconfig,.gitattributes,.gitignore} --exclude=*/**/*
```

### Install Composer

Install [Composer](https://getcomposer.org/):

```bash
$ curl -s http://getcomposer.org/installer | php
```

Official Composer installation instructions [found here](https://getcomposer.org/download/).

## Get this code

Download the code from this repo using composer:

```bash
$ php composer.phar create-project mhulse/slim-php-boiler temp
```

 bash:

```bash
$ mkdir temp && cd temp && bash <(curl -sL https://git.io/v1ITb) && cd -
```

Move the downloaded files from `temp/` into the repository’s root:

```bash
$ mv temp/* . && rm -rf temp/
```

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

### Database

In order for this app to work, create a database named `slim-php-boiler` with `UTF-8 Unicode` for the encoding and `utf8_general_ci` for the collation.

Create a `users` table:

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

In the root of the repo, crate a `config.php` (see [`config-sample.php`](config-sample.php)):

```php
<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'slim-php-boiler');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_PORT', 3306);
```

### Run development server

```
$ php composer.phar start
```

… and visit <0.0.0.0:8080>.

## What else?

**For more information, check out [this repo’s Wiki](../../wiki).**

---

#### LEGAL

Copyright © 2016-2017 [Michael Hulse](http://mky.io/).

Licensed under the Apache License, Version 2.0 (the “License”); you may not use this work except in compliance with the License. You may obtain a copy of the License in the LICENSE file, or at:

[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an “AS IS” BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.

<img src="https://github.global.ssl.fastly.net/images/icons/emoji/octocat.png">
