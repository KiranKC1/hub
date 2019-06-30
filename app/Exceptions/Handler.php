<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\MyBroker;
use Auth;

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
        return parent::render($request, $exception);
    }

    // protected function renderHttpException(HttpException $e)
    // {
    //     $status = $e->getStatusCode();
        
    //     $paths = collect(config('view.paths'));

    //     if( Auth::guard('admin_user')->check() )
    //         view()->replaceNamespace('errors', $paths->map(function ($path) {
    //             return "{$path}/admin/errors";
    //         })->push(__DIR__.'/views')->all());
    //     else
    //         view()->replaceNamespace('errors', $paths->map(function ($path) {
    //             return "{$path}/errors";
    //         })->push(__DIR__.'/views')->all());
        
    //     if (view()->exists($view = "errors::{$status}")) {
    //         return response()->view($view, ['exception' => $e], $status, $e->getHeaders());
    //     }
    //     // dd($e);

    //     return $this->convertExceptionToResponse($e);
    // }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = array_get($exception->guards(),0);
        switch($guard){
            case 'admin_user':
                $login = 'admin_login';
                break;
            default:
                $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }

}
