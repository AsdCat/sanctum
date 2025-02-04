<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => 'succes',
            'user'=> $user,
            'token'=> $token
        ], 201);
    }
    function login(){}
    function logout(){}
}
