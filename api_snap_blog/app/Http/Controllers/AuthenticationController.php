<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Validation\RegisterValidation;

class AuthenticationController extends Controller
{
    public function register(Request $request, RegisterValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());

        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
            

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->input('password')),
            'api_token' => Str::random(30),
        ]);

        return response()->json($user);

    }

}
