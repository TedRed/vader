<?php

namespace App\Http\Events;

/**
 * Class Identity
 * @package App\Core\Events
 */
class Identity implements Event
{
    public function execute(): void
    {
        // TODO: Implement execute() method.
    }

    public function getResponse(): array
    {
       return [
           'message' => 'I am me!. Who the hell are you?'
       ];
    }

}