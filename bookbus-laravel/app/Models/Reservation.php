<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = ['date_reservation', 'status', 'seat_number', 'utilisateur_id'];
    public $timestamps = false;
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
    public function utilisateurs(){
        return $this->belongsToMany(Utilisateur::class);
    }
    public function bus()
    {
        return $this->belongsToMany(Bus::class);
    }
}