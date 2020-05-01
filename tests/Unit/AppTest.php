<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\App;
use \FastRoute\RouteCollector;

/**
 * Class AppTest
 * @package Tests
 */
class AppTest extends TestCase
{

    public function testCanGetVersionFromApp()
    {
        $this->assertIsNumeric($this->app->get('app')->getVersion(), 'The version is NOT an Numeric!');
    }

    public function testCanSetAndGetSocket()
    {
        $this->assertIsInt($this->app->get('app')->getSocket(), 'The socket is NOT an Int!');
    }

    public function testCanSetAndGetAppDirectory()
    {
        $this->assertStringContainsString(
            '/app',
            $this->app->get('app')->getAppDirectory(),
            'The app DIR is incorrect'
        );
    }

    public function testCanGetRouterAndThatItIsInstanceOfRouteCollector()
    {
        $this->assertInstanceOf(
            RouteCollector::class,
            $this->app->get('app')->getRouter(),
            'Is NOT instance of RouteCollector'
        );
    }

    public function testAppHasBeenInitiated()
    {
        $appState = $this->app->get('app')->getState();
        $this->assertIsArray($appState, 'App state is NOT an array!');
        $this->assertTrue($appState['initiated']);;
    }

}
