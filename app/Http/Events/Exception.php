<?php

namespace App\Http\Events;

class Exception implements Event
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
    public function execute()
    {
        return [
            'code' => $this->exceptionHttpCode,
            'message' => $this->exceptionMessage
        ];
    }
}
