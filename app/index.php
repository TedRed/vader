<?php

/**
 * React PHP Boiler Plate Api
 * @author timothy brown
 * @date 2020-04-21
 */

/**
 * Bootstrap Composer
 */
require './vendor/autoload.php';

/**
 * Bootstrap App
 */
$app = require_once './bootstrap/app.php';

/**
 * Set the instance in the container
 */
\Vader\Core\Container::setInstance($app);

/**
 * Load Helpers
 */
require_once 'helpers.php';

/**
 * Bootstrap Server
 */
require_once './bootstrap/server.php';
