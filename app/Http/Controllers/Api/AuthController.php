<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in with the provided credentials
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Find the authenticated user
        $user = User::where('email', $request->email)->firstOrFail();

        // Create a new token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return the token to the client
        return response()->json([
            'token' => $token,
            // 'user' => $user,
        ], 200);
    }
}

