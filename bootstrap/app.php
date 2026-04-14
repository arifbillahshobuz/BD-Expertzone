<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

    return Application::configure(basePath: dirname(__DIR__))
        ->withRouting(
            web: __DIR__.'/../routes/web.php',
            commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
            health: '/up',
        )
        ->withMiddleware(function (Middleware $middleware) {
            $middleware->web(append: [
                \App\Http\Middleware\MaintenanceModeMiddleware::class,
            ]);
            $middleware->alias([
                'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
                'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
                'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            ]);
        })
        ->withExceptions(function (Exceptions $exceptions) {
            $exceptions->render(function (\Illuminate\Http\Exceptions\PostTooLargeException $e, $request) {
                return back()->withErrors(['error' => 'The uploaded file is too large. Please upload a smaller file (Max 2MB).']);
            });
        })->create();
