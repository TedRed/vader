<?php

namespace Vader\Core;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class Container
 * Holds instance of app for global usage
 * @package Vader\Core
 */
class Container
{
    /**
     * @var static $instance
     */
    protected static $instance;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    /**
     * @param ContainerBuilder|null $container
     * @return ContainerBuilder|null
     */
    public static function setInstance(ContainerBuilder $container = null): ?ContainerBuilder
    {
        return static::$instance = $container;
    }
}
