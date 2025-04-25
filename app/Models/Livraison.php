<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory; protected $fillable = [ 
        'numero_colis', 
        'livreur', 
        'colis', 
        'destination',
        'date_livraison',
        'heure_livraison',
        'telephone', 
        'statut',
        'detail_livraison'
        , ]; 
}


