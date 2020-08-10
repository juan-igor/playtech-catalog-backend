<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Get formatted trace from exception.
     *
     * @return string
     */
    public function exceptionTrace($exception)
    {
        $trace = $exception->getTrace()[0];

        if(array_key_exists('file', $trace) && array_key_exists('line', $trace) && array_key_exists('function', $trace)){
            $response = 'Error in file: '.$trace['file'].' in line: '.$trace['line'].' in function: '.$trace['function'].'().';
        } else {
            $response = "The error is not in a function created by the developer";
        }

        return $response;
    }

    /**
     * Get formatted message from exception.
     *
     * @return string
     */
    public function exceptionMessage($exception)
    {
        if (method_exists($exception, 'getMessageBag')) {
            return $exception->getMessageBag();
        } else {
            $message = $exception->getMessage();
            $response = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", ' ', $message)));
        }

        return $response;
    }
}
