<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return "login is here";
    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());
        
    }

    public function logout()
    {
        return response()->json([
            "message" => "you logged out."
        ]);
    }
}
