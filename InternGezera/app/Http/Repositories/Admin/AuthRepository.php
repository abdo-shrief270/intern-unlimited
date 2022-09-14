<?php


namespace App\Http\Repositories\Admin;


use App\Models\Affiliate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AuthRepository implements \App\Http\Interfaces\Admin\AuthInterface
{

    public function loginPage()
    {
        if(!session()->has('url.intended'))
        {
            Redirect::setIntendedUrl(url()->previous());
        }
        return view('login');
    }

    public function login($request)
    {
        if (Auth::guard('admin')->attempt( $request->only(['email','password'])) || Auth::guard('manager')->attempt( $request->only(['email','password'])) || Auth::attempt( $request->only(['email','password']))){
            return redirect(route('admin.home'));
        }else{
            Alert::error('Error',"Your Credentials Don't match our data !");
            return back();
        }
    }

    public function logout($request)
    {
        Session::flush();
        Auth::logout();
        return redirect((route('auth.loginPage')));
    }


}
