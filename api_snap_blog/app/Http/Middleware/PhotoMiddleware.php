<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhotoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->header('CLE-UNIQUE')){
            return response()->json(['error' => 'CLE-UNIQUE header est manquant donc action non autorisée ou impossible'], 400);
        }
        return $next($request);
    }
}
