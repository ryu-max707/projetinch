<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Colis extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_colis',
        'client_id',
        'client',
        'destination',
        'date_envoi',
        'statut',
    ];
    protected $dates = ['date_statut'];



    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function getProgressAttribute()
{
    return match($this->statut) {
        'En transit' => 33,
        'En livraison' => 66,
        'Retardé' => 50,
        default => 0,
    };
}

public function getBadgeColorAttribute()
{
    return match($this->statut) {
        'En transit' => 'bg-yellow-300 text-black',
        'En livraison' => 'bg-green-500 text-white',
        'Retardé' => 'bg-red-500 text-white',
        default => 'bg-gray-400 text-white',
    };
}

protected static function booted()
{
    static::updating(function ($colis) {
        if ($colis->isDirty('statut')) {
            $colis->date_statut = now();
        }
    });
}


}
