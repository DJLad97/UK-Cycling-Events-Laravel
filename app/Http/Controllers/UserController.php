<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function signup(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:200',
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // if($validator->fails()){
        //     return response()->json($validator->messages(), 400);
        // }

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json('User Created', 200);
    }
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'error' => 'Incorrect email or password'
                ], 401);
            }
        }
        catch(JWTException $e){
            return response()->json([
                'error' => 'Could not create token'
            ], 500);
        }
        $user = JWTAuth::toUser($token);
        $races = $user->raceSignUps;
        return response()->json($token, 200);
    }
}
