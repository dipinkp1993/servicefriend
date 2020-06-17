<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Session;
use Auth;
error_reporting(0);
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
        return parent::render($request, $exception);
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return redirect()->route('login');
        }
    }
    protected function unauthenticated($request, AuthenticationException $exception)
    {
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
    /*if ($request->is('servicecenter') || $request->is('servicecenter/*')) {
        return redirect()->guest('/login/servicecenter');
    }
    if ($request->is('wholesaler') || $request->is('wholesaler/*')) {
        return redirect()->guest('/login/wholesaler');
    }*/
    $guard = array_get($exception->guards(), 0);
    switch ($guard) {
        case 'servicecenter':
            $login = 'servicecenterlogin';
            break;
        case 'wholesaler':
                $login = 'wholesalerlogin';
                break;
        default:
            $login = 'login';
            break;
    }
    Session::forget('url.intented'); 
    return redirect()->route($login);
}
}
