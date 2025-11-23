<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login & role_id = 1 (atau sesuai role admin kamu)
        if (!Auth::check() || Auth::user()->role_id !== 1) {
            abort(403, 'Unauthorized'); // atau redirect ke dashboard siswa
        }

        return $next($request);
    }
}
