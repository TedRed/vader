<?php

namespace Tests\Unit;

use FastRoute\RouteCollector;
use Tests\TestCase;
use App\Http\Events\Event;

/**
 * Class EventsTest
 * @package Tests\Unit
 */
class EventsTest extends TestCase
{

    public function testCanGetEvents()
    {
        $events = $this->app->get('app.events')->getEvents();
        $this->assertIsArray($events);
        $this->assertGreaterThan(1, count($events) );
    }

    public function testCanGetEventHandler()
    {
        $handler = $this->app->get('app.events')->getHandler('identifyYourself');
        $this->assertInstanceOf(Event::class, $handler);
    }

    public function testCanGetRouterFromEventsBind()
    {
        $router = $this->app->get('app.events')->getRouter();
        $this->assertInstanceOf(RouteCollector::class, $router);
    }
}
