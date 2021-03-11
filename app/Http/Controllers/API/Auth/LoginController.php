<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only("email", "password"))) {
                return $this->apiError("Credentials do not match", 401);
            }

            /** @var \App\Models\User */
            $user = auth()->user();
            return  response()->json([
                "message" => "Login succeessful",
                "token" => $user->createToken($user->fullname . "'s access token.")->plainTextToken,
                "user" => new UserResource($user),
            ], 200);
        } catch (\Exception $e) {
            return $this->apiError($e->getMessage(), 500);
        }
    }

    public function logout()
    {
        try {
            if (auth()->check()) {
                /** @var \App\Models\User */
                $user = auth()->user();
                $user->token()->delete();
            }
        } catch (\Exception $e) {
            return $this->apiError($e->getMessage(), 500);
        }
        return $this->apiSuccess("Logout successful!", 200);
    }
}
