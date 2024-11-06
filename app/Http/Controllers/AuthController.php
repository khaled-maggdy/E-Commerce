<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $request = $request->validated();
        $create  = User::create($request);
        if ($create) {
            return $this->response(code: 200, data: $create);
        } else {
            return $this->response(code: 401);
        }
    }
    public function login(StoreLoginRequest $request)
    {
        $request = $request->validated();
        $Auth = Auth::attempt($request);
        if ($Auth) {
            $user = Auth::user();
            $token = $user->createToken('front-end', $user->role, Carbon::now()->addDays(7))->plainTextToken;
            $user['token'] = $token;
            return $this->response(code: 200, data: $user);
        } else {
            return $this->response(code: 401);
        }
    }
    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        $currentToken = PersonalAccessToken::findToken($token);
        if ($currentToken) {
            if ($currentToken->delete()) {
                return $this->response(code: 202, msg: 'Logged out successfully');
            }
        } else {
            return $this->response(code: 404, msg: 'Cannot log out at the moment');
        }
    }
    public function logout_all()
    {
        $logout = Auth::user()->tokens()->delete();
        if ($logout) {
            return $this->response(code: 202, msg: 'Logged out from all devices successfully');
        } else {
            return $this->response(code: 404, msg: 'Cannot log out at the moment');
        }
    }
}
