<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 */
class TestCase extends PHPUnitTestCase
{
    public $app;

    protected function setUp(): void
    {
        $this->app = require './bootstrap/app.php';
        parent::setUp();
    }

    protected function tearDown(): void
    {
        $this->app = null;
        parent::tearDown();
    }

}
