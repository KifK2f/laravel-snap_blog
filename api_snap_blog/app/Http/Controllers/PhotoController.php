<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Facades\Validator;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Récupérer tout le contenu de la table photos
    public function index()
    {
        $photos = Photo::all(); // Récupérer tous les éléments de la table photos
        return response()->json($photos); // Retourner les données sous forme de JSON
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:10',
            'description' => 'required|min:15',
        ],[
            'title.required' => 'Le champ title est obligatoire',
            'title.max' => 'Le champ title ne doit pas dépasser 10 caractères',
            'description.required' => 'Le champ description est obligatoire',
            'description.min' => 'Le champ description doit avoir au moins 15 caractères',
        ]        
        ); //Required signifie que le champ est obligatoire,max:255 signifie que le champ ne doit pas dépasser 255 caractères, min:15 signifie que le champ doit avoir au moins 15 caractères

        // Si la validation échoue, retourner les erreurs de validation
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]); 
        }

        // // Récupérer tous les éléments du body de la requête
        // $photo = new stdClass(); // Créer un objet vide
        // $photo->title = $request->input('title'); // Récupérer le champ 'title' du body de la requête et l'ajouter à l'objet $photo
        // $photo->description = $request->input('description'); // Récupérer le champ 'description' du body de la requête et l'ajouter à l'objet $photo
        // return response()->json($photo); // retourner sous forme de JSON

        //Persister les données dans la base de données
        Photo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return response()->json(['success' => 'Photo crée avec succès']); // retourner un message de succès

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
