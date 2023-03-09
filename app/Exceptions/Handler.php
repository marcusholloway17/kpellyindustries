<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Container\Container;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Drewlabs\Contracts\Http\UnAuthorizedResponseHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Drewlabs\Core\Validator\Exceptions\ValidationException as CustomValidationException;
use Drewlabs\Packages\Http\Contracts\ResponseHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        CustomValidationException::class
    ];
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof CustomValidationException) {
                return Container::getInstance()->make(ResponseHandler::class)->badRequest($exception->getErrors());
            }
            if ($exception instanceof AuthenticationException) {
                return Container::getInstance()->make(UnAuthorizedResponseHandler::class)->unauthorized($request, $exception);
            }
            if ($exception instanceof AuthorizationException) {
                return Container::getInstance()->make(UnAuthorizedResponseHandler::class)->unauthorized($request, $exception);
            }

            // A catch all case that send a Json response event in case of exception
            if ($exception instanceof \Throwable) {
                return Container::getInstance()->make(ResponseHandler::class)->error($exception);
            }
        }
        return parent::render($request, $exception);
    }
}
