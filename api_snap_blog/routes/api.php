<?php

use Illuminate\Support\Facades\Route;

// ---Routes sans paramètres---
// Route::get('/foo', function () {
//     return 'Hello, World!';
// });

// Route::get('/test', function () {
//     return 'Route de test';
// });

// // Redirection sur /foo si on tente d'aller sur /test
// Route::redirect('/test', '/api/foo');

// ---Routes avec paramètres---
Route::get('/welcome/{name}', function ($name) {
    return "Welcome " .$name;
});

Route::get('/users', function () {
    $user = new stdClass(); //Objet vide pour le moment
    $user->name = "Kodzovi Friedo FIANYO"; // On ajoute une propriété name à l'objet
    $user->email = "fianyofriedo2@gmail.com"; // On ajoute une propriété email à l'objet
    return response()->json($user); // On retourne l'objet $user sous form de JSON
});