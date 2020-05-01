<?php

namespace Vader\Core;

/**
 * Class Request
 * @package Vader\Core
 */
class Request
{

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getParams()
    {
        return $this->request->getQueryParams();
    }

    public function getBody()
    {
        return $this->request->getParsedBody();
    }
}
