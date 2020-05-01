<?php

namespace App\Http\Events;

/**
 * Interface Event
 * @package App\Core\Events
 */
interface Event
{
    public function execute(): void;

    public function getResponse(): array;
}
