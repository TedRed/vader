<?php

namespace App\Core;

use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Exceptions\NestedValidationException;

class ErrorHandler
{
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        try {
            return $next($request);
        } catch (NestedValidationException $exception) {
            return JsonResponse::badRequest(...$exception->getMessages());
        } catch (\Throwable $error) {
            return JsonResponse::internalServerError($error->getMessage());
        }
    }
}