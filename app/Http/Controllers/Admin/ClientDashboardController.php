<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colis;

class ClientDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Colis::query();

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('numero_colis')) {
            $query->where('numero_colis', $request->numero_colis);
        }

        if ($request->filled('date_envoi')) {
            $query->whereDate('date_envoi', $request->date_envoi); // corrigé ici
        }

        if ($request->filled('recherche')) {
            $query->where('numero_colis', 'like', '%' . $request->recherche . '%');
        }

        $colis = $query->latest()->get();

        return view('admin.dashboard-client', compact('colis'));
    }
}
