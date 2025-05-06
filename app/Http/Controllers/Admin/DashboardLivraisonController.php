<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
 
use App\Models\Livraison;
use App\Models\Colis;

class DashboardLivraisonController extends Controller
{
    public function index()
    {
        $livraisons = Colis::with('client')->latest()->take(10)->get();
        $colisEnTransit = Colis::where('statut', 'en transit')->count();
        $livraisonsDuJour = Colis::whereDate('date_envoi', today())->count();
        $retards = Colis::where('statut', 'Retardé')->count();
        $satisfaction = 44; // à calculer si tu veux une vraie valeur

        return view('admin.dashboard-livraison', compact(
            'livraisons',
            'colisEnTransit',
            'livraisonsDuJour',
            'retards',
            'satisfaction'
        ));
    }
}