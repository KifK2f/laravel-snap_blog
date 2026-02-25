<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    protected $with = [
        'user'
    ]; //Pour que les données de l'utilisateur soient automatiquement chargées avec les photos

    //Car fera apres reference à user_id dans la table pictures
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
