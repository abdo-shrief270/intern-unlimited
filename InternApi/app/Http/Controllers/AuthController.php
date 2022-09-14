<?php

namespace App\Http\Controllers;

use App\Http\Events\UserRegisteredEvent;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('auth:api,admin', ['except' => ['login','loginAdmin','register','registerAdmin']]);
    }


    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->apiResponse('401','Email and Password Not Match!','Unauthorized');
        }


        return $this->respondWithToken($token);
    }

    public function loginAdmin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('admin')->attempt($credentials)) {
            return $this->apiResponse('401','Email and Password Not Match!','Unauthorized');
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        if(auth()->guard('admin')->check()){
            return $this->apiResponse(200,null,null,auth()->guard('admin')->user());
        }
        return $this->apiResponse(200,null,null,auth()->user());
    }


    public function logout()
    {
        auth()->logout();
        return $this->apiResponse(200,'Successfully logged out');
    }


    public function refresh()
    {
        if(auth()->guard('admin')->check()){
            return $this->respondWithToken(auth()->guard('admin')->refresh());
        }

        return $this->respondWithToken(auth()->refresh());

    }

    protected function respondWithToken($token)
    {
        return $this->apiResponse('200',null,null,[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        UserRegisteredEvent::dispatch($user);
        return $this->apiResponse(200,'User Account Has Been Created :)',null,null);
    }

    public function registerAdmin(AdminRegisterRequest $request)
    {
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return $this->apiResponse(200,'Admin Account Has Been Created :)',null,null);
    }

}
