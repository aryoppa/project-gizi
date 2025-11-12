<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        // jika ada route lain, pertahankan
    )
    ->withMiddleware(function (Middleware $middleware) {
        /*
         * Alias: 'count.visitor' untuk middleware CountVisitor
         * Dengan alias ini kita bisa menggunakan ->middleware('count.visitor') di routes.
         */
        $middleware->alias([
            'count.visitor' => \App\Http\Middleware\CountVisitor::class,
        ]);

        // Jika ingin agar middleware berjalan globally (untuk semua request), gunakan append:
        // $middleware->append(\App\Http\Middleware\CountVisitor::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
