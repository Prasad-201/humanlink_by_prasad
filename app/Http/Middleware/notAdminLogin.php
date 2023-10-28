<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class notAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('job_entry_admin')) {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
