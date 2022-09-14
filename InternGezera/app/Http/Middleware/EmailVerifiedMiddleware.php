<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmailVerifiedMiddleware
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
        if(! (!is_null(optional(Auth::guard('admin')->user())->email_verified_at) || !is_null(optional(Auth::guard('manager')->user())->email_verified_at) || !is_null(optional(Auth::user())->email_verified_at))){
            Alert::error('Error','Please Verify Your Email Address !');
            return redirect(route('auth.loginPage'));
        }
        return $next($request);
    }
}
