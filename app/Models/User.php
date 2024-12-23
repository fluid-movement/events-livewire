<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class)->withPivot('role');
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class)->withPivot('status');
    }

    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    public function notAttending(Event $event): bool
    {
        return !$this->events()->find($event->id);
    }

    public function attending(Event $event): bool
    {
        return !!$this->belongsToMany(Event::class)
            ->wherePivot('status', Event::$attending)
            ->find($event->id);
    }

    public function interested(Event $event): bool
    {
        return !!$this->belongsToMany(Event::class)
            ->wherePivot('status', Event::$interested)
            ->find($event->id);
    }
}
