<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            $user = $request->user();
            $tokenName = $request->input('token_name', 'api-token');
            $token = $user->createToken($tokenName);
            return response($token->plainTextToken, 200)
                ->header('Content-Type', 'text/plain');
        }

        return response()->json([
            'ok' => false,
            'message' => 'datos incorrectos',
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()?->currentAccessToken()?->delete();

        return response()->json([
            'ok' => true,
            'message' => 'sesion cerrada',
        ], 200);
    }
}
