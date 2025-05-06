<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;

class LivraisonForm extends Component
{
    public $mode = 'create'; // ou 'edit'
    public $livraisonId;

    public $numero_colis, $livreur, $colis, $destination, $date_livraison, $heure_livraison, $statut, $telephone;

    protected $listeners = ['editLivraison' => 'loadLivraison'];

    protected $rules = [
        'numero_colis' => 'required',
        'livreur' => 'required',
        'colis' => 'required|numeric',
        'destination' => 'required',
        'date_livraison' => 'required|date',
        'heure_livraison' => 'required',
        'statut' => 'required',
        'telephone' => 'nullable',
    ];

    public function mount($mode = 'create')
    {
        $this->mode = $mode;
    }

    public function resetFormFields()
    {
        $this->reset(['livraisonId', 'numero_colis', 'livreur', 'colis', 'destination', 'date_livraison', 'heure_livraison', 'statut', 'telephone']);
    }

    public function loadLivraison($id)
    {
        $this->mode = 'edit';
        $livraison = Livraison::findOrFail($id);
        $this->livraisonId = $livraison->id;
        $this->numero_colis = $livraison->numero_colis;
        $this->livreur = $livraison->livreur;
        $this->colis = $livraison->colis;
        $this->destination = $livraison->destination;
        $this->date_livraison = $livraison->date_livraison;
        $this->heure_livraison = $livraison->heure_livraison;
        $this->statut = $livraison->statut;
        $this->telephone = $livraison->telephone;

        $this->dispatchBrowserEvent('show-edit-modal');
    }

    public function save()
    {
        $this->validate();

        if ($this->mode === 'create') {
            Livraison::create($this->only(['numero_colis', 'livreur', 'colis', 'destination', 'date_livraison', 'heure_livraison', 'statut', 'telephone']));
            session()->flash('message', 'Livraison ajoutée avec succès.');
        } else {
            Livraison::where('id', $this->livraisonId)->update($this->only(['numero_colis', 'livreur', 'colis', 'destination', 'date_livraison', 'heure_livraison', 'statut', 'telephone']));
            session()->flash('message', 'Livraison modifiée avec succès.');
        }

        $this->reset(); // Réinitialiser les champs
    $this->dispatchBrowserEvent('close-modal'); // Fermer le modal
    $this->emit('refreshLivraisons');           // Rafraîchir la liste
    session()->flash('message', 'Livraison ajoutée avec succès.');
    }

    public function render()
    {
        return view('livewire.admin.livraison-form');
    }
}
