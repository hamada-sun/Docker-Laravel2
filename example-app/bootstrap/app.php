<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\RoleMiddleware::class,
        ]);//これが、v11以降の、protected $middlewareAliases = [...]の書き方
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();


// //以下教科書記述部分P.241
//     protected $middlewareGroups = [
//         'web' => [
//             //routes/web.phpで有効なミドルウェア
//             \App\Http\Middleware\VerifyCsrfToken::class,//@csrf記述忘れで419 ERROR
//         ],

//         'api' => [
//             //routes.api.phpで有効なミドルウェア
//         ],
//     ];

//     protected $middlewareAliases = [
//         'auth' => \App\Http\Middleware\Authenticate::class,
//     ];
//もちろん今の環境v12では使えない

    // ->withMiddleware(function (Middleware $middleware): void {
    //     // $middleware -> remove(\Illuminate\Foundation\Http\Middleware\TrimStrings::class);
    //     //v12現在、TrimStringsはデフォルトで入っている。上記コードはそれを無効化するもの
    //     //
    //     'admin' => \App\Http\Middleware\RoleMiddleware::class,
    // })
