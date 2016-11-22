<?php

$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));

$app->add(new \App\Middleware\OldInputMiddleware($container));

$app->add(new \App\Middleware\CsrfViewMiddleware($container));

$app->add(new \App\Middleware\AuthMiddleware($container));

$app->add(new \App\Middleware\FlashMiddleware($container));

$app->add($container->csrf);
