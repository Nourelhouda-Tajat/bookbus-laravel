<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gare extends Model
{
    protected $table = 'gares';
    public $timestamps = false;
    protected $fillable = ['nom', 'adresse', 'ville_id'];
    public function ville(){
        return $this->belongsTo(Ville::class);
    }
    public function villes(){
        return $this->belongsToMany(Ville::class);
    }
    public function routes(){
        return $this->belongsToMany(Route::class);
    }
    public function segmentsDepart(){
        return $this->belongsToMany(Segment::class);
    }
    public function segmentsArrivee(){
        return $this->belongsToMany(Segment::class);
    }
}
