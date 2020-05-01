<?php

namespace App\Http\Events;

use Vader\Core\Request;

/**
 * Class BaseEvent
 * @package App\Http\Events
 */
class BaseEvent
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return Request|null
     */
    public function getRequest(): ?Request
    {
        return $this->request;
    }
}
