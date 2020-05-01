<?php

namespace App\Http\Events;

/**
 * Class Search Hotel
 * @package App\Core\Events
 */
class SearchHotel implements Event
{

    public function execute(): void
    {

    }

    public function getResponse(): array
    {
        return [
            'message' => 'Searching Hotel!!!'
        ];
    }
}