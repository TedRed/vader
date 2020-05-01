<?php

namespace App\Http\Events;

class Exception extends BaseEvent implements Event
{

    private $exceptionHttpCode;

    private $exceptionMessage;

    /**
     * Exception constructor.
     * @param $code
     * @param string $message
     */
    public function __construct($code, $message = '')
    {
        $this->exceptionHttpCode = $code;
        $this->exceptionMessage = $message;
    }

    /**
     * Execute
     */
    public function fire()
    {
        return [
            'code' => $this->exceptionHttpCode,
            'message' => $this->exceptionMessage
        ];
    }
}
