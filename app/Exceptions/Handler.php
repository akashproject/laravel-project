<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Auth\AuthenticationException;
use App\Providers\RouteServiceProvider;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson()) {
            return response()->json(['message' => $exception->getMessage()], 401);
        }

        $guard = $exception->guards()[0];

        if ($guard == 'admin') {
            return redirect(RouteServiceProvider::ADMIN_LOGIN);
        }
        else if($guard == 'client'){
            return redirect(RouteServiceProvider::CLIENT_LOGIN);
        }
        else{
            // return redirect(RouteServiceProvider::HOME);
            return redirect('login');
        }
    }
}