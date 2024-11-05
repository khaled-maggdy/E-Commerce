<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $request = $request->validated();
        $create  = User::create($request);
        if ($create){
        return $this->response(code:200 ,data:$create);
        }else {
        return $this->response (code : 401);
    }
}
    public function login(StoreLoginRequest $request)
    {
        $request = $request->validated();
        $Auth = Auth::attempt($request);
        if ($Auth) {
            $user = Auth::user();
            $token = $user->createToken()->plainTextToken;
            $user['token'] = $token;
            return $this->response(code: 200, data: $user);
        } else {
            return $this->response(code: 401);
        }
    }
}
