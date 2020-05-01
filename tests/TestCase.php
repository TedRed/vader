<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 */
class TestCase extends PHPUnitTestCase
{
    protected static $app;

    public static function setUpBeforeClass(): void
    {
        /**
         * Bootstrap App
         */
        self::$app = require_once './bootstrap/app.php';
    }

}
