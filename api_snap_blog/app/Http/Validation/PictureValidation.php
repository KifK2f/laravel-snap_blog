<?php

namespace App\Http\Validation;

class PictureValidation
{
    public function rules(){
        return [
            'title' => ['required', 'string', 'max:150', 'unique:pictures,title', 'min:3'], // unique:pictures,title pour éviter les titres en double dans la table pictures
            'description' => ['required', 'max:250'],
            'image' => ['required', 'image', 'mimes:jpeg,png,bmp,gif,svg,webp', 'max:2048'], // max:2048 pour limiter la taille de l'image à 2Mo
        ];
    }

    

    public function messages(){
        return [
            'title.required' => 'Vous devez spécifier un titre',
            'title.max' => 'Le titre ne doit pas dépasser 150 caractères',
            'title.unique' => 'Ce titre est déjà utilisé',
            'title.min' => 'Le titre doit contenir au moins 3 caractères',
            'description.required' => 'Vous devez spécifier une description',
            'description.max' => 'La description ne doit pas dépasser 250 caractères',
            'image.required' => 'Vous devez spécifier une image',
            'image.image' => 'Votre format d\'image n\'est pas valide',
            'image.mimes' => ' formats acceptés : jpeg, png, bmp, gif, svg, webp',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2Mo',
            'image.uploaded' => 'La taille dépasse la limite serveur (2Mo)',
        ];
    }
} 
