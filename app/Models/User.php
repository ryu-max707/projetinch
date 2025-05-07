<?php

 

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
 

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;  
     


    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }





    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
}

