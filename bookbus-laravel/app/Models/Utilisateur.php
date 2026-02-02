<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable =['nom', 'email', 'password', 'role', 'phone'];
    protected $hidden = ['password'];
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function segments(){
        return $this->belongsToMany(Segment::class);
    }
}
