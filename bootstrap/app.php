<?php
/**
 * React PHP Boiler Plate Api
 *
 * @author timothy brown
 * @date 2020-04-21
 */

use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Core\App;
use App\Core\Events;

/**
 * Create Container
 */
$app = $__app = new ContainerBuilder();

/**
 * Register Components
 */

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
    ->addArgument(new Std)
    ->addArgument(new GroupCountBased);

/**
 * Events
 *
 * System is based on business events
 * Eg 'createBooking', 'cancelBooking', 'searchHotels'
 *
 */
$app->register('app.events', Events::class)
    ->addArgument($app->get('app')->getAppDirectory() . '/events.php')
    ->addArgument($app->get('app.router'));

/**
 * Bind the router to return the corresponding event and get its handler
 */
$app->get('app')->setRouter(
    $app->get('app.events')->bind()
);
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
