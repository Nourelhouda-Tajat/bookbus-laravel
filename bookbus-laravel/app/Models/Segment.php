<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;

    protected $table = 'segments';
    protected $fillable = ['depart_id',  
        'arrive_id',
        'route_id',
        'tarif',
        'duree_estimee',
        'distance_km'];
    public $timestamps = false;
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function etapeDepart()
    {
        return $this->belongsTo(Etape::class, 'depart_id');
    }

    public function etapeArrivee()
    {
        return $this->belongsTo(Etape::class, 'arrive_id');
    }

   
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'segment_id');
    }

}