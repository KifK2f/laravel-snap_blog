<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Http\Validation\PictureValidation;

class PictureController extends Controller
{
    public function store(Request $request, PictureValidation $validation){
        $validator = validator($request->all(), $validation-> rules(), $validation->messages());

        
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $fullFileName = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($fullFileName, PATHINFO_FILENAME);  // contiendra le nom sans l'extension  
        $extension = $request->file('image')->getClientOriginalExtension(); // contiendra l'extension du fichier
        $file = $filename . '_' . time() . '.' . $extension; // pour éviter les conflits de nom de fichier

        $request->file('image')->storeAs('public/pictures', $file); // stocker le fichier dans le dossier storage/app/private/public/pictures
        // Si le dossier n'existe pas, il sera créé automatiquement par Laravel

        $picture = Picture::create([
            'image' => $file,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => 2,
        ]);
        
        return response()->json($picture);

    }
}
