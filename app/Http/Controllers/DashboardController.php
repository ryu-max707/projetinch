<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(100); 

        $stats = [
            [
                'label' => 'Total Clients',
                'value' => $clients->count(),
                'variation' => 12,
                'icon' => 'bi bi-people-fill'
            ],
            [
                'label' => 'Clients Actifs',
                'value' => $clients->where('statut', 'Actif')->count(),
                'variation' => 9,
                'icon' => 'bi bi-person-check-fill text-success'
            ],
            [
                'label' => 'Nouveaux Clients',
                'value' => $clients->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count(),
                'variation' => 7,
                'icon' => 'bi bi-person-plus-fill text-secondary'
            ],
            [
                'label' => 'Clients Premium',
                'value' => $clients->where('type', 'Premium')->count(),
                'variation' => 44,
                'icon' => 'bi bi-star-fill text-warning'
            ],
        ];

        return view('admin.dashboard', [
            'clients' => $clients,
            'stats' => $stats
        ]);
    
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());
        Client::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Client ajouté avec succès.');
    }

    public function update(Request $request, Client $client)
    {
        $request->validate($this->rules($client->id));
        $client->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Client mis à jour avec succès.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Client supprimé avec succès.');
    }

    private function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'type' => 'required|in:Particulier,Professionnel,Premium',
            'zone' => 'required|string|max:255',
            'colis' => 'required|integer|min:0',
            'telephone' => 'required|string|max:15',
            'statut' => 'required|in:Actif,En attente,Inactif',
        ];
    }
}
