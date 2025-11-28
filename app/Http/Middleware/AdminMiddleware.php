<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // cek apakah user sudah login DAN role = admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak punya akses sebagai admin.');
        }

        return $next($request);
    }
}
