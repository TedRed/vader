<?php

namespace App\Http\Events;

class FlyYWing extends BaseEvent implements Event
{
    public function fire()
    {
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'Red Ten standing by.'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
