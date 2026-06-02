<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

    //merging multiple middleware into a group
            // $middleware->appendToGroup('merge',[
            //     AdminMiddleware::class,
            //     Teacher\TeacherMiddleware::class,
            // ]);

        $middleware->alias([ //alias for middleware short name
            'admin.auth' => \App\Http\Middleware\AdminMiddleware::class,
            'teacher' => \App\Http\Middleware\Teacher\TeacherMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
