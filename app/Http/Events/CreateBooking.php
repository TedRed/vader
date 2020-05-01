<?php

/**
 * React PHP Boiler Plate Api
 * @author timothy brown
 * @date 2020-04-21
 */

namespace App\Http\Events;

/**
 * Class CreateBooking
 * @package App\Core\Events
 */
class CreateBooking implements Event
{

    public function execute()
    {
        return [
            'message' => 'Created booking!!!'
        ];
    }
}
