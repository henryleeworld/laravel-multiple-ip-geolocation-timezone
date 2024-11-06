<?php

namespace App\Models;

use Carbon\Carbon;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone'
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

    public  function getCreatedAtAttribute($value) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone'));
        $date->setTimezone($this->attributes['timezone']);
        return $date;
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = 
        Carbon::parse($value, $this->attributes['timezone'])->setTimezone(config('app.timezone'));
    }

    public  function getUpdatedAtAttribute($value) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone'));
        $date->setTimezone($this->attributes['timezone']);
        return $date;
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = 
        Carbon::parse($value, $this->attributes['timezone'])->setTimezone(config('app.timezone'));
    }
}
