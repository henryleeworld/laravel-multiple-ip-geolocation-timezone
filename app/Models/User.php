<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Interact with the user's created time.
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => (Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone')))->setTimezone($attributes['timezone']),
            set: fn (mixed $value, array $attributes) => Carbon::parse($value, $attributes['timezone'])->setTimezone(config('app.timezone')),
        );
    }

    /**
     * Interact with the user's updated time.
     */
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => (Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone')))->setTimezone($attributes['timezone']),
            set: fn (mixed $value, array $attributes) => Carbon::parse($value, $attributes['timezone'])->setTimezone(config('app.timezone')),
        );
    }
}
