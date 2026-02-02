<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    public $timestamps = false;
    protected $fillable = ['nom_trajet', 'adresse'];
    public function gares(){
        return $this->belongsToMany(Gare::class);
    }
    public function programmes(){
        return $this->belongsToMany(Programme::class);
    }
    public function etapes(){
        return $this->belongsToMany(Etape::class);
    }
}
