<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json($user);
    }

    public function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('email','password'))) {
            return response()->json([
                'message' => 'The given data was invalid',
                'errors' => [
                    'password' => 'Invalid credentials'
                ]
            ],422);
        }

        $user = User::where('email',$request->email)->first();
        $token = $user->createToken('cm360-auth')->plainTextToken;

        return response()->json([
            'access_token' => $token
        ]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'message'=>'User logged out'
        ]);
    }
}
