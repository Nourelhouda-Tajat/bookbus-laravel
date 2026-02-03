<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';
    public $timestamps = false;
    protected $fillable = ['nom_trajet', 'description'];
    public function segments(){
        return $this->hasMany(Segment::class, 'route_id');
    }
    public function programmes(){
        return $this->hasMany(Programme::class, 'route_id');
    }
    public function etapes(){
        return $this->hasMany(Etape::class, 'route_id')->orderBy('ordre');
    }
}
