<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pour éviter l'erreur "Specified key was too long; max key length is 767 bytes" lors de la migration
        Schema::defaultStringLength(171); //Pour éviter d'écrire $table->string('name', 171); partout dans les migrations
 
    }
}
