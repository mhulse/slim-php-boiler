<?php

session_start();

date_default_timezone_set('America/Los_Angeles');

# Database connection config constants:
require __DIR__ . '/../config.php';

# Composer's autoload classes:
require __DIR__ . '/../vendor/autoload.php';

# Instantiate the app:
$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);

# Dependency Injection Container (DIC) configuration:
$container = $app->getContainer();

# Custom validatio rules nemspace using Respect library:
\Respect\Validation\Validator::with('\\App\\Validation\\Rules\\');

# Register middleware:
require __DIR__ . '/dependencies.php';

# Register middleware:
require __DIR__ . '/middleware.php';

# Register routes:
require __DIR__ . '/../app/routes.php';
