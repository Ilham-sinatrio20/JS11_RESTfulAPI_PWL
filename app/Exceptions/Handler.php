<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    public function render($request, $exception){
        if($exception instanceof ModelNotFoundException && $request->wantsJson()){
            return response()->json(
                ['message' => 'Not Found!'],
                Response::HTTP_NOT_FOUND
            );
        }
        return parent::render($request, $exception);
    }
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
}
