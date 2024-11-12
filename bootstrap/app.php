<?php

use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\TestMiddleware;
use App\Http\Middleware\TestMiddleware2;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //Global Middleware
        // $middleware->append(TestMiddleware::class);

        //Group Middleware
        // $middleware->web(append:[
        //     TestMiddleware::class,
        // ]);

        //Alias Middleware
        $middleware->alias([
            'check'=>TestMiddleware::class,
            'check2'=>TestMiddleware2::class,
            'role'=>CheckRoleMiddleware::class,
        ]);

        $middleware->priority([
            TestMiddleware2::class,
            TestMiddleware::class,
        ]);

        $middleware->redirectGuestsTo('/login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
