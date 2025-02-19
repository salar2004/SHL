<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // إعادة توجيه المستخدم إذا لم يكن لديه الصلاحية
            return redirect('/dashboard')->with('error', 'ليس لديك الصلاحية للوصول إلى هذه الصفحة.');
        }

        return $next($request);
    }
}
