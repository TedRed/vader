<?php

use Vader\Core\Container;

if (! function_exists('response')) {
    function response($body, $code = 200, $header = '')
    {
    }
}

if (! function_exists('app')) {

    /**
     * @param null $abstract
     * @return mixed
     */
    function app($abstract = null)
    {
        if (! $abstract) {
            return Container::getInstance()->get('app');
        }
        return Container::getInstance()->get($abstract);
    }
}

if (! function_exists('config')) {
    function config($name)
    {
    }
}
