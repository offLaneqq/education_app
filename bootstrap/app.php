<?php

use App\Http\Middleware\CanViewPostMiddleware;
use App\Http\Middleware\IsAdminMiddleware;
use App\Mail\PostCountMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // create another name(alias) for middleware
        $middleware->alias(['can-view-post' => CanViewPostMiddleware::class]);
        $middleware->alias(['is-admin' => IsAdminMiddleware::class]);
    })
    // Second way to use 
    // ->withSchedule(function(Schedule $schedule) {
    //     $schedule->call(function() {
    //         Mail::to('admin@example.com')->send(new PostCountMail());
    //     })->everyMinute()->name('sendMailAdminCount')->withoutOverlapping();
    // })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        $exceptions->render(function(NotFoundHttpException $e) {
            // return response()->view('errors.404');
            if($e->getPrevious() instanceof ModelNotFoundException) {
                return response()->json(['message' => 'Post Not Found'], 404);
            }
        });
    })->create();
