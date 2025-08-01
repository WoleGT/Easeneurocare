<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'services',
        'appointment_date',
        'appointment_time',
        'phone_number',
        'subject',
        'message',
        'is_read',
        'is_archived',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'services' => 'array',
        'appointment_date' => 'date',
        'appointment_time' => 'string', // stored as string, parsed when needed
        'is_read' => 'boolean',
        'is_archived' => 'boolean',
    ];

    /**
     * Accessor to get formatted 12-hour appointment time.
     */
    public function getFormattedTimeAttribute()
{
    return $this->appointment_time 
        ? \Carbon\Carbon::createFromFormat('H:i', $this->appointment_time)->format('g:i A') 
        : null;
}


}
