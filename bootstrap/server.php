<?php

/**
 * React PHP Boiler Plate Api
 *
 * @author timothy brown
 * @date 2020-04-21
 */

use Vader\Core\ErrorHandler;
use Vader\Core\JsonRequestDecoder;
use Vader\Core\Router;
use React\Http\Server;
use React\EventLoop\Factory as EventLoopFactory;

/**
 * Run the Server
 */
$loop = EventLoopFactory::create();
$app->register('app.server', Server::class)
    ->addArgument([
        new ErrorHandler(),
        new JsonRequestDecoder(),
        new Router($app->get('app')->getRouter())
    ]);

$app->register('app.socket', \React\Socket\Server::class)
    ->addArgument($app->get('app')->getSocket())
    ->addArgument($loop);

$app->get('app.server')->listen(
    $app->get('app.socket')
);

echo "Server running at http://127.0.0.1:" . $app->get('app')->getSocket() . PHP_EOL;

$loop->run();
