<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Validation\RegisterValidation;
use Illuminate\Support\Facades\Auth;
use App\Http\Validation\LoginValidation;

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

    public function login(Request $request, LoginValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());

        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
            
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = User::where('email', $request->input('email'))->firstOrFail();
            return response()->json($user);
        }else{
            return response()->json(['error' => 'Mauvais identifiants de connexion']);
        }
    }

}
