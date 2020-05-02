<?php

namespace App\Http\Events;

/**
 * Class FlyXWing
 * @package App\Core\Events
 */
class FlyXWing extends BaseEvent implements Event
{

    public function fire()
    {
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'Red leader: All wings report in.'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
