<?php

namespace Org\Core\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CustomHandlerException extends ExceptionHandler
{
    protected function renderHttpException(HttpExceptionInterface $e)
    {
        if ($e instanceof NotFoundHttpException) {
            dd('You are lost.');
        }

        return parent::renderHttpException($e);
    }
}
