<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;

    protected $table = 'etapes';
    public $timestamps = false;
    protected $fillable = ['adresse', 'heure_passage', 'ordre','route_id', ];
    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    
    public function segmentsDepart()
    {
        return $this->hasMany(Segment::class, 'etape_depart_id');
    }

    
    public function segmentsArrivee()
    {
        return $this->hasMany(Segment::class, 'etape_arrivee_id');
    }
}
