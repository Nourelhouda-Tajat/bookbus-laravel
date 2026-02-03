<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $table = 'programmes';
    public $timestamps = false;

    protected $fillable = ['bus_id', 'route_id', 'date_depart', 'heure_depart', 'heure_arrivee', 'status'];
    public function bus(){
        return $this->belongsTo(Bus::class, 'bus_id');
    }
    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
    public function reservations(){
        return $this->hasMany(Reservation::class, 'programme_id');
    }
}
