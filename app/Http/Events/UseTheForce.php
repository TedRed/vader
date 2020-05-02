<?php

/**
 * React PHP Boiler Plate Api
 * @author timothy brown
 * @date 2020-04-21
 */

namespace App\Http\Events;

use Vader\Core\Container;

/**
 * Class UseTheForce
 * @package App\Core\Events
 */
class UseTheForce extends BaseEvent implements Event
{
    public function fire()
    {

        $app = app();

        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'Use the force luke....'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
