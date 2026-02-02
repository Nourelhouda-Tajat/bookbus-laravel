<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'villes';
    protected $fillable = ['nom_ville'];
    public $timestamps = false;
    public function gares(){
        return $this->belongsToMany(Gare::class);
    }
}
