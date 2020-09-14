<?php

namespace App\Exceptions;

use Error;
use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof TokenExpiredException) {
                return response()->json([
                    'success' => false,
                    'error' => [
                        'message' => 'TOKEN_EXPIRED',
                    ],
                ], 401);
            } elseif ($preException instanceof TokenInvalidException) {
                return response()->json([
                    'success' => false,
                    'error' => [
                        'message' => 'TOKEN_INVALID',
                    ],
                ]);
            } elseif ($preException instanceof TokenBlacklistedException) {
                return response()->json([
                    'success' => false,
                    'error' => [
                        'message' => 'TOKEN_BLACKLISTED',
                    ],
                ], 401);
            }
        }

        if ($exception->getMessage() === 'Token not provided') {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Token not provided',
                ],
            ], 401);
        }

        if ($exception instanceof AuthenticationException) {
            if(! $request->expectsJson()){
                return redirect()->away('/login');
            }

            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Unauthenticated',
                ],
            ], 401);
        }

        return $this->prepareJsonResponse($request, $exception);
    }

    protected function prepareJsonResponse($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $message = method_exists($exception, 'getMessageBag') ? $exception->getMessageBag() : $exception->getMessage();

            return response()->json([
                'success' => false,
                'exception' => $this->getExceptionClass($exception),
                'message' => $message
            ]);
        }

        if($exception instanceof Error) {
            return response()->json([
                'success' => false,
                'error' => [
                    'exception_class' => $this->getExceptionClass($exception),
                    'message' => $exception->getMessage(),
                    'trace' => $this->getTrace($exception),
                ],
            ]);
        }

        $exception = FlattenException::create($exception);

        if (config('app.debug')) {
            $message = $exception->getMessage();
            if(strlen($message) === 0){
                $message = Response::$statusTexts[$exception->getStatusCode()];
            }
        } else {
            $message = Response::$statusTexts[$exception->getStatusCode()];
        }

        $error_array = [
            'exception_class' => $this->getExceptionClass($exception),
            'http_code' => $exception->getStatusCode(),
            'message' => $message,
            'trace' => $this->getTrace($exception),
        ];

        if(! $request->expectsJson()){
            switch($exception->getStatusCode()){
                case 401: return response()->view('errors.401');
                case 403: return response()->view('errors.403', compact('exception'));
                case 404: return response()->view('errors.404');
                case 419: return response()->view('errors.419');
                case 429: return response()->view('errors.429');
                case 500: return response()->view('errors.500', compact('error_array'));
                case 503: return response()->view('errors.503', compact('exception'));
            }
        }

        return response()->json([
            'success' => false,
            'error' => $error_array,

        ], $exception->getStatusCode());
    }

    private function getTrace($exception)
    {
        if (config('app.debug')) {
            return 'file: '.$exception->getFile().' line: '.$exception->getLine();
        }
    }

    private function getExceptionClass($exception)
    {
        if (config('app.debug')) {
            return get_class($exception);
        }
    }
}
