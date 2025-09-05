Add this to app/Http/Kernel.php under $routeMiddleware:
'admin' => \App\Http\Middleware\AdminMiddleware::class,
