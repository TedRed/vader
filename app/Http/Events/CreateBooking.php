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
class CreateBooking extends BaseEvent implements Event
{
    public function fire()
    {
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'message' => 'Create Booking!!!!'
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
