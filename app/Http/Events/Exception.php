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
        return new \React\Http\Response(
            200,
            array('Content-Type: application/json'),
            json_encode([
                'code' => $this->exceptionHttpCode,
                'message' => $this->exceptionMessage
            ], JSON_THROW_ON_ERROR, 512)
        );
    }
}
