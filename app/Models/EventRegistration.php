<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'payment_proof',
        'payment_status',
        'is_attended',
        'certificate_path',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function event()
{
    return $this->belongsTo(Event::class);
}

}
