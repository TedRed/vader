<?php

namespace App\Http\Events;

class Exception implements Event {

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
    public function execute(): void
    {
        // TODO: Implement execute() method.
    }

    /**
     * Get Response
     *
     * @return array
     */
    public function getResponse(): array
    {
        return [
            'code' => $this->exceptionHttpCode,
            'message' => $this->exceptionMessage
        ];
    }

}
