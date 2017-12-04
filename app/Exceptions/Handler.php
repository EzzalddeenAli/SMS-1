<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //check if login is needed
        if ($exception instanceof AuthenticationException) {
            $guard = array_get($exception->guards(), 0);
            switch ($guard) {
                case 'admin':
                    $login = 'admin.login';
                    break;
                case 'teacher':
                    $login = 'teacher.login';
                    break;
                case 'student':
                    $login = 'student.login';
                    break;
                case 'registrar':
                    $login = 'registrar.login';
                    break;
                default:
                    $login = 'home.main';
            }

            return redirect()->guest(route($login));
        }
        //if forbidden
        if ($exception->getStatusCode() === 403) {
            return response()->view('error',
                [
                    'code' => $exception->getStatusCode(),
                    'message' => '403 Access Forbidden'
                ]);
        }

        return parent::render($request, $exception);
    }
}
