<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckHireTalentIsNotLogin
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
        if (Session()->get(HLINKROLE) != EMPLOYER) {
            return redirect(url('/'))->with('error', 'Login Your Account');
        }

        return $next($request);
    }
}
