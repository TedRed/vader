<?php

/**
 * Vader Api - React PHP Events Api
 * @author timothy brown
 * @date 2020-05-02
 */

namespace Vader\Core;

use App\Http\Events\Event;
use App\Http\Events\Exception;
use FastRoute\RouteCollector;

/**
 * Class Events
 * @package App\Core
 */
class Events
{

    /**
     * @var mixed
     */
    private $events;

    /**
     * @var RouteCollector
     */
    private $router;

    /**
     * @var Event
     */
    private $handler;

    /**
     * @var $eventsDir
     */
    private static $eventsDir = '\\App\\Http\\Events\\';

    /**
     * @var bool
     * @default false
     */
    private static $hasInitiated = false;

    /**
     * @var array
     */
    private static $eventInstances = [];

    /**
     * Events constructor.
     * @param RouteCollector $router
     * @param $appPath
     */
    public function __construct(RouteCollector $router, $appPath)
    {
        $this->events = include $appPath . '/events.php';
        $this->router = $router;
    }

    /**
     * Get Events
     *
     * @return mixed
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return RouteCollector
     */
    public function getRouter(): ?RouteCollector
    {
        return $this->router;
    }

    /**
     * Get Event Handler
     *
     * @param $name
     * @return Exception|bool|mixed
     */
    public function getHandler($name)
    {

        $handler = self::$eventsDir . $this->events[$name];

        if (isset(self::$eventInstances[$handler])) {
            return $this->handler = self::$eventInstances[$handler];
        }

        if ($handler) {
            try {
                $tmpHandler = new $handler();
            } catch (\Exception $e) {
                $this->handler = new Exception(
                    500,
                    'Handler cannot be initiated.'
                );
                return $this->handler;
            }

            if ($tmpHandler instanceof Event) {
                $this->handler = self::$eventInstances[$handler] = $tmpHandler;
                self::$hasInitiated = true;
            } else {
                $this->handler = new Exception(
                    500,
                    'Handler is not instance of \App\Core\Events\Event interface'
                );
                return $this->handler;
            }
        }

        if (! self::$hasInitiated) {
            $this->handler = new Exception(404);
        }

        return $this->handler;
    }

    /**
     * Bind Event to Handler
     *
     * @return RouteCollector
     */
    public function bind(): RouteCollector
    {
        $this->router->get('/{name}', function ($request, $name) {
            $handler = $this->getHandler($name);
            if ($handler instanceof Event) {
                $handler->setRequest(new Request($request));
                //Run middleware
                return $handler->fire();
            }
        });

        return $this->router;
    }
}
