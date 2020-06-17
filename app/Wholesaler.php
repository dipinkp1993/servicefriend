<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class wholesaler extends Authenticatable
{
    use Notifiable;

    protected $guard = 'wholesaler';
    protected $primaryKey ='wid';

    protected $fillable = [
        'wholesalername', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
