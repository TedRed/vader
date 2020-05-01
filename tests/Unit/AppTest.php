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
        $this->assertIsNumeric(parent::$app->get('app')->getVersion(), 'The version is NOT an Numeric!');
    }

    public function testCanSetAndGetSocket()
    {
        $this->assertIsInt(parent::$app->get('app')->getSocket(), 'The socket is NOT an Int!');
    }

    public function testCanSetAndGetAppDirectory()
    {
        $this->assertStringContainsString(
            '/app',
            parent::$app->get('app')->getAppDirectory(),
            'The app DIR is incorrect'
        );
    }

    public function testCanGetRouterAndThatItIsInstanceOfRouteCollector()
    {
        $this->assertInstanceOf(
            RouteCollector::class,
            parent::$app->get('app')->getRouter(),
            'Is NOT instance of RouteCollector'
        );
    }

    public function testAppHasBeenInitiated()
    {
        $appState = parent::$app->get('app')->getState();
        $this->assertIsArray($appState, 'App state is NOT an array!');
        $this->assertTrue($appState['initiated']);;
    }

}
