<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class React
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('API-TOKEN'); // Récupérer le token dans les en-têtes de la requête
        if(!$token){
            return response()->json(['message' => 'Token manquant'], 403);
        }

        $user = User::where('api_token', $token)->first(); // Rechercher l'utilisateur correspondant au token
        if(!$user){
            return response()->json(['message' => 'Invalid Credentials'], 403);
        }

        Auth()->login($user); // Authentifier l'utilisateur pour la requête en cours

        return $next($request);
    }
}
