<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $fillable = ['nom_ville'];
    public function gares(){
        return $this->belongsToMany(Gare::class);
    }
}
