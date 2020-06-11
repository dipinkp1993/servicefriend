<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Servicecenter extends Authenticatable
{
    use Notifiable;

    protected $guard = 'servicecenter';
    protected $primaryKey ='sid';

    protected $fillable = [
        'centername', 'email', 'password','cno','address','licenseno',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
