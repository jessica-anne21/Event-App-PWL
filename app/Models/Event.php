<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
    'name',
    'main_event_datetime',
    'sub_event_datetime',
    'location',
    'speaker',
    'description',
    'poster',
    'fee',
    'quota',
    'created_by',
];

public function event() {
    return $this->belongsTo(Event::class);
}



}
