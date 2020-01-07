<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'timezone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public  function getCreatedAtAttribute($value) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone'));
        $date->setTimezone(config('user.timezone'));
        return $date;
    }
 
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = 
        Carbon::parse($value, config('user.timezone'))->setTimezone(config('app.timezone'));
    }

    public  function getUpdatedAtAttribute($value) {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, config('app.timezone'));
        $date->setTimezone(config('user.timezone'));
        return $date;
    }
 
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = 
        Carbon::parse($value, config('user.timezone'))->setTimezone(config('app.timezone'));
    }
}
