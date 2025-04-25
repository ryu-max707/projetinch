<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;

class LivraisonShow extends Component
{
    public $numero_colis, $telephone, $colis, $date_livraison, $heure_livraison, $destination, $livreur, $detail_livraison, $statut;

    protected $listeners = ['showLivraison'];

    public function showLivraison($id)
    {
        $livraison = Livraison::findOrFail($id);
        $this->numero_colis = $livraison->numero_colis;
        $this->colis = $livraison->colis;
        $this->detail_livraison = $livraison->detail_livraison;
        $this->telephone = $livraison->telephone;
        // $this->date_livraison = $livraison->date_livraison;
        // $this->heure_livraison = $livraison->heure_livraison;
        $this->statut = $livraison->statut;
        $this->date_livraison = \Carbon\Carbon::parse($livraison->date_livraison)->format('d/m/Y');
        $this->heure_livraison = \Carbon\Carbon::parse($livraison->heure_livraison)->format('H:i');
        $this->telephone = $livraison->telephone;

        $this->destination = $livraison->destination;
        $this->livreur = $livraison->livreur;
        $this->statut = $livraison->statut;
    }

    public function render()
    {
        return view('livewire.admin.livraison-show');
    }
}
