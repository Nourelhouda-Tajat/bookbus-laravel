<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $fillable = ['adresse'];
    public function routes(){
        return $this->belongsToMany(Route::class);
    }
}
