<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;

class LivraisonList extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        // Affiche les livraisons du plus ancien au plus récent
        $livraisons = Livraison::orderBy('id', 'asc')->paginate(13);

        return view('livewire.admin.livraison-list', compact('livraisons'));
    }

    public function edit($id)
    {
        // Utilisation de emitUp pour atteindre le composant parent s'il existe
        $this->emitUp('editLivraison', $id);
    }

    public function delete($id)
    {
        Livraison::destroy($id);
        session()->flash('message', 'Livraison supprimée.');
        
        // Rafraîchit uniquement ce composant sans rechargement
        $this->emitSelf('refresh');
    }
}
