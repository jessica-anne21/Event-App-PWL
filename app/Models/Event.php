<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time',
        'location',
        'speaker',
        'poster',
        'fee',
        'quota',
        'created_by',
    ];

    // Relasi: Event dimiliki oleh User (pembuatnya)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi: Event punya banyak pendaftaran
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
