<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = ['matricule', 'capacite', 'status'];
    public function programmes(){
        return $this->hasMany(Programme::class);
    }
    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
