<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';
    protected $fillable =['nom', 'email', 'password', 'role', 'phone'];
    // public $timestamps = false;
    protected $hidden = ['password'];
    public function reservations(){
        return $this->hasMany(Reservation::class, 'utilisateur_id');
    }
}
