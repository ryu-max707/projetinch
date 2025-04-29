<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Colis;

class ColisList extends Component
{
    use WithPagination;

    public $numero_colis, $client, $destination, $date_envoi, $statut;
    public $colis_id = null;
    public $isEditMode = false;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'numero_colis' => 'required|string|max:255',
        'client' => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        'date_envoi' => 'required|date',
        'statut' => 'required|string|in:En livraison,En transit,Retardé',
    ];

    protected $messages = [
        'numero_colis.required' => 'Le numéro du colis est obligatoire.',
        'client.required' => 'Le nom du client est obligatoire.',
        'destination.required' => 'La destination est obligatoire.',
        'date_envoi.required' => 'La date d\'envoi est obligatoire.',
        'statut.required' => 'Le statut est obligatoire.',
    ];

    public function render()
    {
        $colis = Colis::latest()->paginate(10);
        return view('livewire.admin.colis-list', compact('colis'));
    }

    public function resetFields()
    {
        $this->numero_colis = '';
        $this->client = '';
        $this->destination = '';
        $this->date_envoi = '';
        $this->statut = '';
        $this->colis_id = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        Colis::create([
            'numero_colis' => $this->numero_colis,
            'client' => $this->client,
            'destination' => $this->destination,
            'date_envoi' => $this->date_envoi,
            'statut' => $this->statut,
        ]);

        session()->flash('success', 'Colis ajouté avec succès.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $colis = Colis::findOrFail($id);
        $this->colis_id = $colis->id;
        $this->numero_colis = $colis->numero_colis;
        $this->client = $colis->client;
        $this->destination = $colis->destination;
        $this->date_envoi = $colis->date_envoi;
        $this->statut = $colis->statut;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $colis = Colis::findOrFail($this->colis_id);
        $colis->update([
            'numero_colis' => $this->numero_colis,
            'client' => $this->client,
            'destination' => $this->destination,
            'date_envoi' => $this->date_envoi,
            'statut' => $this->statut,
        ]);

        session()->flash('success', 'Colis modifié avec succès.');
        $this->resetFields();
    }

    public function delete($id)
    {
        $colis = Colis::findOrFail($id);
        $colis->delete();

        session()->flash('success', 'Colis supprimé avec succès.');
    }
}
