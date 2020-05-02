<?php

use Vader\Core\Container;

if (! function_exists('response')) {
    /**
     * @param $body
     * @param int $code
     * @param array $header
     * @return \React\Http\Response
     */
    function response($body, $code = 200, $header = ['Content-Type: application/json'])
    {
        return new \React\Http\Response(
            $code,
            $header,
            json_encode($body, JSON_THROW_ON_ERROR, 512)
        );
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
