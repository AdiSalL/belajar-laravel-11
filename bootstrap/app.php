<?php

use App\Exceptions\ValidationError;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->append(LogMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        $exceptions->dontReport(ValidationError::class);

        $exceptions->renderable(function(ValidationError $exceptions, Request $request) {
            return response("Bad Request", 400);
        });
    })->create();
