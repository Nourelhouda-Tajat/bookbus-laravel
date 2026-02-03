<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'bus';
    protected $fillable = ['matricule', 'capacite', 'status', 'type'];
    public $timestamps = false;
    public function programmes(){
        return $this->hasMany(Programme::class, 'bus_id');
    }
    
}
