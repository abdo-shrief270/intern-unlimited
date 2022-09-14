<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next,$roleName)
    {
        if(in_array($roleName,['web','admin','manager'])){

            if(Auth::guard($roleName)->check()){

                return $next($request);

            }else{

                Alert::error('Error','You Have No Access To This Routes !');
                return back();

            }

        }else{

            Alert::error('Error','Role Name Must Be An Existing Guard !');
            return back();

        }

    }
}
