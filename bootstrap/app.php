<?php

use App\Http\Middleware\SecurityHeaders;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(SecurityHeaders::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

if (isset($_SERVER['LARAVEL_STORAGE_PATH']) && $_SERVER['LARAVEL_STORAGE_PATH']) {
    $app->useStoragePath($_SERVER['LARAVEL_STORAGE_PATH']);
    $app->useBootstrapPath($_SERVER['LARAVEL_STORAGE_PATH'] . '/bootstrap');
} elseif (isset($_ENV['LARAVEL_STORAGE_PATH']) && $_ENV['LARAVEL_STORAGE_PATH']) {
    $app->useStoragePath($_ENV['LARAVEL_STORAGE_PATH']);
    $app->useBootstrapPath($_ENV['LARAVEL_STORAGE_PATH'] . '/bootstrap');
}

return $app;
