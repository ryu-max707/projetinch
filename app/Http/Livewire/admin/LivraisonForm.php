<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;
use Carbon\Carbon;

class LivraisonForm extends Component
{
    public $livraisonId, $numero_colis, $telephone, $date_livraison, $heure_livraison, $colis, $destination, $livreur, $statut;
    public $mode = 'create';

    protected $listeners = ['editLivraison' => 'edit'];

    public function resetFormFields()
    {
        $this->reset([
            'livraisonId', 'numero_colis', 'telephone',
            'date_livraison', 'heure_livraison', 'colis',
            'destination', 'livreur', 'statut', 'mode'
        ]);
        $this->mode = 'create';
    }

    protected function rules()
    {
        return [
            'numero_colis'    => 'required',
            'colis'           => 'required',
            'destination'     => 'required',
            'livreur'         => 'required',
            'date_livraison'  => 'required|date',
            'heure_livraison' => 'required|date_format:H:i',
            'telephone'       => 'required',
            'statut'          => 'required'
        ];
    }

    public function save()
    {
        $this->validate();

        $data = [
            'numero_colis'    => $this->numero_colis,
            'colis'           => $this->colis,
            'date_livraison'  => Carbon::parse($this->date_livraison)->format('Y-m-d'),
            'heure_livraison' => $this->heure_livraison,
            'telephone'       => $this->telephone,
            'destination'     => $this->destination,
            'livreur'         => $this->livreur,
            'statut'          => $this->statut
        ];

        if ($this->mode === 'edit' && $this->livraisonId) {
            Livraison::findOrFail($this->livraisonId)->update($data);
            session()->flash('message', 'Livraison mise à jour !');
        } else {
            Livraison::create($data);
            session()->flash('message', 'Livraison ajoutée !');
        }

        $this->resetFormFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->emitUp('refresh'); // important pour bien propager à la liste

         
    }

    public function edit($id)
    {
        $this->mode = 'edit';
        $livraison = Livraison::findOrFail($id);

        $this->livraisonId     = $livraison->id;
        $this->numero_colis    = $livraison->numero_colis;
        $this->telephone       = $livraison->telephone;
        $this->date_livraison  = Carbon::parse($livraison->date_livraison)->format('Y-m-d');
        $this->heure_livraison = Carbon::parse($livraison->heure_livraison)->format('H:i');
        $this->colis           = $livraison->colis;
        $this->destination     = $livraison->destination;
        $this->livreur         = $livraison->livreur;
        $this->statut          = $livraison->statut;
    }

    public function render()
    {
        return view('livewire.admin.livraison-form');
    }
}

