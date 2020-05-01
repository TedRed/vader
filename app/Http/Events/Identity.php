<?php

namespace App\Http\Events;

/**
 * Class Identity
 * @package App\Core\Events
 */
class Identity extends BaseEvent implements Event
{
    public function fire()
    {
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'I am me!. Who the hell are you?'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
