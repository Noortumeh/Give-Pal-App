<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function register(UserRequest $request)
    {
        try {
            $credintals = $request->validated();
            if (User::where('email', $credintals['email'])->first()) {
                return response(['message' => 'User Already Registered'], 209);
            }
            $credintals['password'] = bcrypt($credintals['password']);
            User::create($credintals);
            return response(['message' => 'User Created Successfuly'], 201);
        } catch (Exception $error) {
            return response(['message' => 'Some Server Error: '] . $error, 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credintals = $request->validate([
                'email' => 'required|email|string|max:255',
                'password' => 'required|string|min:6'
            ]);

            if (!Auth::attempt($credintals)) {
                return response(['message' => 'Invalid Login Credintals!'], 401);
            }
            $user = User::where('email', $credintals['email'])->first();
            if(!$user){
                return response(['message' => 'User Not Found'], 401);
            }
            $token = $user->createToken('auth_token')->plainTextToken;

            return response([
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        } catch (Exception $error) {
            return response(['message' => 'Some Server Error', 'error' => $error], 500);
        }
    }
}
