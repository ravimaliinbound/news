<?php

namespace App\Models;

use App\Notifications\ExhibitorResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Exhibitor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $hidden = [
        'password',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ExhibitorResetPasswordNotification($token));
    }

    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }

    public function inquiry()
    {
        return $this->hasOne('App\Models\Inquiry', 'exhibitor_id', 'id');
    }
}
