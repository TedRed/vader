<?php

namespace App\Http\Events;

/**
 * Class Search Hotel
 * @package App\Core\Events
 */
class SearchHotel implements Event
{

    public function execute()
    {
        return [
            'message' => 'Searching Hotel!!!'
        ];
    }
}
