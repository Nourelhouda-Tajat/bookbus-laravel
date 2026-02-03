<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'status',
        'seat_number',
        'prix',
        'utilisateur_id',
        'segment_id',
        'programme_id',
    ];
    public $timestamps = false;
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');  // ← CORRIGER ICI
    }
}