<?php

namespace Vader\Core;

use \App\Http\Events\Event;
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
     *
     */
    private static $eventsDir = '\\App\\Http\\Events\\';

    /**
     * @var bool
     *
     * @default false
     */
    private static $hasInitiated = false;

    /**
     * Events constructor.
     *
     * @param string $events
     * @param RouteCollector $router
     */
    public function __construct(string $events, RouteCollector $router)
    {
        $this->events = include $events;
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
     * Get Event Handler
     *
     * @param $name
     * @return Events\Exception|bool|mixed
     */
    public function getHandler($name)
    {

        $handler = self::$eventsDir.$this->events[$name];

        if($handler){
            try {
                $tmpHandler = new $handler;
            }catch ( \Exception $e){
                $this->handler = new \App\Http\Events\Exception(
                    500,
                    'Handler cannot be initiated.'
                );
                return false;
            }

            if($tmpHandler instanceof Event){
                $this->handler = new $tmpHandler;
                self::$hasInitiated = true;
            }else{
                $this->handler = new \App\Http\Events\Exception(
                    500,
                    'Handler is not instance of \App\Core\Events\Event interface'
                );
                return false;
            }
        }

        if(! self::$hasInitiated) {
            $this->handler = new \App\Http\Events\Exception(404);
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
            if($handler) {
                $handler->execute();
                $response = $handler->getResponse();
            }
            return new \React\Http\Response(
                200,
                array('Content-Type: application/json'),
                json_encode($response)
            );
        });

        return $this->router;
    }
}
