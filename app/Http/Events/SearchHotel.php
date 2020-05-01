<?php

namespace App\Http\Events;

/**
 * Class Search Hotel
 * @package App\Core\Events
 */
class SearchHotel extends BaseEvent implements Event
{

    public function fire()
    {
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'Searching Hotel!!!'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
