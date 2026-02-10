<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'description']; // Permet de spécifier les champs qui peuvent être remplis en masse (mass assignment)
}
