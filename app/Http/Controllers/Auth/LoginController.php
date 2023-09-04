<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{    
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
        
            return response()->json([
                "success" => true,
                "message" => 'User login successfully.',
                "user" => $user
            ]);
        } 
        else{
            return response()->json([
                "success" => false,
                "message" => 'User not found.',
            ]);
        } 

    }
}

