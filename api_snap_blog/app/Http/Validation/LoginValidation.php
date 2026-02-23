<?php

namespace App\Http\Validation;

class LoginValidation
{
    public function rules(){
        return [
            'email' => ['required', 'email'],
            'password' => ['required','string','min:8'],
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Vous devez spécifier votre adresse email',
            'password.required' => 'Vous devez spécifier votre mot de passe',
        ];
    }
} 
