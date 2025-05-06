<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Colis;


    class Client extends Model { 
        use HasFactory; protected $fillable = [ 
            'name', 
            'email', 
            'type', 
            'zone', 
            'colis',
            'telephone', 
            'statut', ]; 


     public function colis()
            {
                return $this->hasMany(Colis::class);
            }
}
