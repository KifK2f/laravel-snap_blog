<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PhotoController;

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

// Route::get('/users', function () {
//     $user = new stdClass(); //Objet vide pour le moment
//     $user->name = "Kodzovi Friedo FIANYO"; // On ajoute une propriété name à l'objet
//     $user->email = "fianyofriedo2@gmail.com"; // On ajoute une propriété email à l'objet
//     return response()->json($user); // On retourne l'objet $user sous form de JSON
// });

// ---Sans utiliser de controller---
// //Créer les routes avec Get, Post, Put, Patch et Delete
// Route::get('/users', function () {
//     return response()->json(['success' => 'Méthode GET']);
// });

// // // Pour que le body de Postman soit pris en compte, il faut ajouter Request $request
// // Route::post('/users', function (Request $request) {
// //     return response()->json(['success' => 'Méthode POST']);
// // });

// Route::post('/users', function (Request $request) {
//     return $request->all(); //Récupérer tous les éléments 
// });

// ---Avec un controller---
// Route::get('/users', [TestController::class, 'getMethod']);

// Route::post('/users', [TestController::class, 'postMethod']);

// Sans middelware
// Route::post('/photos', [PhotoController::class, 'store']);
// // Avec middelware
// Route::post('/photos', [PhotoController::class, 'store'])->middleware('App\Http\Middleware\PhotoMiddleware');

// // Route de test pour voir ce que contient les variables d'environnement
// Route::get('/env', function () {
//     return response()->json([
//         'connection' => env('DB_CONNECTION'),
//         'host' => env('DB_HOST'),
//         'port' => env('DB_PORT'),
//         'database' => env('DB_DATABASE'),
//         'username' => env('DB_USERNAME'),
//         'password' => env('DB_PASSWORD'),
//     ]);
// });

//Persister les données en bas de données
// Route::post('/photos', [PhotoController::class, 'store']);

// Route::get('/photos', [PhotoController::class, 'index']);
