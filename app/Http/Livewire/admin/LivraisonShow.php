<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;

class LivraisonShow extends Component
{
    public $livraison;
    public $livraisonId;

    protected $listeners = ['showLivraisonDetails' => 'loadLivraison'];

    public function loadLivraison($id)
    {
        $this->livraisonId = $id;
        $this->livraison = Livraison::find($id);
    }

    public function render()
    {
        return view('livewire.admin.livraison-show');
    }
}