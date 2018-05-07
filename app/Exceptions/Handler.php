<?php

namespace Imperium\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException as Unauthorized;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException as MethodNotAllowed;

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
        if ($exception instanceof MethodNotAllowed) {
            //check if is running on the api host
            if(strpos($request->getHttpHost(), 'api.') !== false){
                return response()->json(['success' => false, 'error' => 'Method Not Allowed'], 405);
            }
        }
        elseif ($exception instanceof Unauthorized) {
            //check if is running on the api host
            if(strpos($request->getHttpHost(), 'api.') !== false){
                return response()->json(['success' => false, 'error' => $exception->getMessage()], 401);
            }
        }

        return parent::render($request, $exception);
    }
}
