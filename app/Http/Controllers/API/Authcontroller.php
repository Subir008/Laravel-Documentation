<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class Authcontroller extends Controller
{
    //
    function signup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min: 5',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status'=> false,
                'message' => 'Validation error',
                'error' => $validator->errors()
            ],401);
        }

        $user = User::create($request->all());

        return response()->json( [
            'status' => true ,
            'message' => 'Signup successful',
            'user' => $user
        ] ,200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status'=> false,
                'message' => 'Validation error',
                'error' => $validator->errors()->all()
            ],404);
        }

        $user = Auth::user();
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
            return response()->json( [
                'status' => true ,
                'message' => 'Login successful',
                'token' => $user->createToken('Api')->plainTextToken,
                'token_type' => 'bearer'
            ] ,200);
        }else{
            return response()->json([
                'status'=> false,
                'message' => 'Credentials Not Match'
            ],404);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'user' => $user,
            'message' => 'Logged Out Successful'
        ]);
    }
}
