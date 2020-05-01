<?php
/**
 * React PHP Boiler Plate Api
 * @author timothy brown
 * @date 2020-04-21
 */

namespace Vader\Core;

use FastRoute\RouteCollector;

/**
 * Class App
 * @package App\Core
 */
class App
{

    /**
     * App Version
     *
     * @var string
     */
    private static $version = '1.0';

    /**
     * @var bool
     */
    private static $initiated = false;

    /**
     * Project root directory
     *
     * @var string|null
     */
    private $rootDir;

    /**
     * App directory
     *
     * @var string
     */
    private $appDir;

    /**
     * @var int
     */
    private $socket;

    /**
     * @var
     */
    private $router;

    /**
     * App constructor.
     * @param $roodDir
     */
    public function __construct($roodDir, $socket = 8080)
    {
        $this->rootDir = $roodDir;
        $this->appDir = $roodDir . '/app';
        $this->socket = $socket;
    }

    /**
     * @return string
     */
    public function getAppDirectory()
    {
        return $this->appDir;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::$version;
    }

    /**
     * @return int
     */
    public function getSocket()
    {
        return $this->socket;
    }

    public function getState()
    {
        return ['initiated' => self::$initiated];
    }

    /**
     * @param RouteCollector $router
     */
    public function setRouter(RouteCollector $router){
        $this->router = $router;

        self::$initiated = true;
    }

    /**
     * @return RouteCollector|null
     */
    public function getRouter(): ?RouteCollector
    {
        return $this->router;
    }
}
