<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = ['bus_id', 'matricule', 'capacite', 'heure_arrivee', 'actif'];
    public function bus(){
        return $this->belongsToMany(Bus::class);
    }
    public function routes(){
        return $this->belongsToMany(Route::class);
    }
    public function segments(){
        return $this->belongsToMany(Segment::class);
    }
}
