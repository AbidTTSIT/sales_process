<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'role' => 'required|string',
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validate->errors()
            ], 422);
        }

        $user = User::where('role', $request->role)
            ->where(function ($query) use ($request) {
                $query->where('mobile', $request->login)
                    ->orWhere('email', $request->login);
            })->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
          return response()->json([
            'status' => false,
            'message' => 'Invalid credentials'
          ], 401);
        }   
        
        $token = JWTAuth::fromUser($user);
        if($token)
        {
            return response()->json([
                'status' => true,
                'message' => 'user successfully login',
                'user' => $user,
                'token' => $token
            ], 200);
        }
    }
}
