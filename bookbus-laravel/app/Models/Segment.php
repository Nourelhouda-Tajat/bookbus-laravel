<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';
    protected $fillable = ['tarif', 'duree_estimee', 'distance_km'];
    public $timestamps = false;
    public function programmes(){
        return $this->belongsToMany(Programme::class);
    }
    public function utilisateurs(){
        return $this->belongsToMany(Utilisateur::class);
    }
    public function garesDepart(){
        return $this->belongsToMany(Gare::class);
    }
    public function garesArrivee(){
        return $this->belongsToMany(Gare::class);
    }
}
