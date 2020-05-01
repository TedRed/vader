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
        return [
            'message' => 'Searching Hotel!!!'
        ];
    }
}
