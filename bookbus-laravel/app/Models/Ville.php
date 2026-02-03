<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes';
    protected $fillable = ['nom_ville'];
    public $timestamps = false;
    public function gares(){
        return $this->hasMany(Gare::class, 'ville_id');
    }
}
