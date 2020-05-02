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
        return response([
            'message' => 'I am me!. Who the hell are you?'
        ]);
    }
}
