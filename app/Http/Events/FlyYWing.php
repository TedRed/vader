<?php

namespace App\Http\Events;

class FlyYWing extends BaseEvent implements Event
{
    public function fire()
    {
        return response([
            'message' => 'Red Ten standing by.'
        ]);
    }
}
