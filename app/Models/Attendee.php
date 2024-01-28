<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendee extends Model
{
    use HasFactory;


    public static $notAttending = 0;
    public static $attending = 1;
    public static $maybeAttending = 2;

    protected $fillable = [
        'user_id',
        'event_id',
        'status'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAttending($query, User $user)
    {
        return $query->where('status', self::$attending)->forUser($user);
    }

    public function scopeMaybeAttending($query, User $user)
    {return $query->where('status', self::$maybeAttending)->forUser($user);
    }

    public function scopeForEvent($query, Event $event)
    {
        return $query->where('event_id', $event->id);
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
