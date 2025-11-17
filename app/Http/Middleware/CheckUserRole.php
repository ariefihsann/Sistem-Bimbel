<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roleId): Response
    {
        // 1. Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Ambil peran pengguna saat ini
        $userRoleId = auth()->user()->role_id;

        // Periksa apakah role pengguna sama dengan role yang dibutuhkan
        if ($userRoleId == $roleId) {
            return $next($request);
        }

        // Jika peran tidak sesuai, arahkan ke dashboard atau halaman yang sesuai
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
