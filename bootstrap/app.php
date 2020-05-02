<?php

/**
 * Vader Api - React PHP Event Api
 *
 * @author timothy brown
 * @date 2020-04-21
 */

use Vader\Core\App;
use Vader\Core\Config;
use Vader\Core\Events;
use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Create Container
 */
$app = $__app = new ContainerBuilder();

/**
 * App
 */
$app->register('app', App::class)
    ->addArgument(dirname(__FILE__, 2))
    ->addArgument(8080);

/**
 * Init the router
 */
$app->register('app.router', RouteCollector::class)
    ->addArgument(new Std())
    ->addArgument(new GroupCountBased());

/**
 * Events
 *
 * System is based on business events
 * Eg 'createBooking', 'cancelBooking', 'searchHotels'
 *
 */
$app->register('app.events', Events::class)
    ->addArgument($app->get('app.router'))
    ->addArgument($app->get('app')->getAppDirectory());

/**
 * Bind the router to return the corresponding event and get its handler
 */
$app->get('app')->setRouter(
    $app->get('app.events')->bind()
);

/**
 * Config
 */
$app->register('app.config', Config::class)
    ->addArgument($app->get('app')->getRootDirectory());


/**
 * Middleware
 */

/**
 * Validation Factory ?
 */

/**
 * Facades
 */

/**
 * Database ?
 */

return $app;
