<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'message' => 'email ou mot de passe incorect',
                ],
                401
            );
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $tokens = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'success' => true,
            'user' => $user,
            'token' => $tokens,
        ]);
    }

    public function logout(Request $request)
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'statut' => 200,
            'message' => 'Vous avez été déconnecté',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return response()->json([
           'status' => 200,
           'message' => 'Vous avez été créé',
            'user' => $user,
        ]);
    }
}
