<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientForm extends Component
{

    public $successMessage;

    public $client_id;
    public $name, $email, $type, $zone, $colis, $telephone, $statut;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'type' => 'required|string',
        'zone' => 'required|string',
        'colis' => 'required|numeric',
        'telephone' => 'required|string',
        'statut' => 'required|string',
    ];

    protected $listeners = ['editClient' => 'loadClient', 'resetFormFields' => 'resetForm'];

    public function save()
    {
        $this->validate();

        Client::updateOrCreate(
            ['id' => $this->client_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'type' => $this->type,
                'zone' => $this->zone,
                'colis' => $this->colis,
                'telephone' => $this->telephone,
                'statut' => $this->statut,
            ]
        );

        $this->resetForm();

        $this->emit('clientUpdated');
        $this->dispatchBrowserEvent('close-modal');
        $this->successMessage = $this->client_id 
    ? "Client modifié avec succès !" 
    : "Client ajouté avec succès !";

    }

    // ✅ Correction ici
    public function loadClient($clientId)
    {
        $client = Client::findOrFail($clientId);

        $this->client_id = $client->id;
        $this->name = $client->name;
        $this->email = $client->email;
        $this->type = $client->type;
        $this->zone = $client->zone;
        $this->colis = $client->colis;
        $this->telephone = $client->telephone;
        $this->statut = $client->statut;
    }

    public function resetForm()
    {
        $this->reset(['client_id', 'name', 'email', 'type', 'zone', 'colis', 'telephone', 'statut']);
    }

    public function render()
    {
        return view('livewire.client-form');
    }
}
