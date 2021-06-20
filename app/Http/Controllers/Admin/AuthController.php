<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $rules = [
                "email" => "required",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            //login

            $credentials = $request->only(['email', 'password']);

            $token = Auth::attempt($credentials);

            if (!$token)
                return response()->json(['error' => "Wrong Credentials"]);

            $user = Auth::user();
            $user->api_token = $token;
            //return token
            return response()->json(['user' => $user]);

        } catch (\Exception $ex) {
            return response()->json(['error' => "Something went wrong"]);
        }


    }

    public function logout(Request $request)
    {
        $token = $request->header('auth-token');
        if($token){
            try {

                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return response()->json(['error' => "Something went wrong"]);

            }
            return response()->json(['msg' => "Logged out successfully"]);
        }else{
            return response()->json(['error' => "Something went wrong"]);
        }

    }
}
