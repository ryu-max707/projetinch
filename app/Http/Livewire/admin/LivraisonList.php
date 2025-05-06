<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Livraison;
use Livewire\WithPagination;

class LivraisonList extends Component
{
    use WithPagination;
    protected $listeners = ['refreshLivraisons' => '$refresh'];

    
    protected $paginationTheme = 'bootstrap'; // Assure que la pagination utilise Bootstrap

    public $search = '';
    public $selectedId;
    
    // Définir les query strings pour que l'état soit conservé dans l'URL
    protected $queryString = ['search' => ['except' => '']];

    // Cette méthode est appelée automatiquement par Livewire quand $search change
    public function updatedSearch()
    {
        // Reset la pagination quand la recherche change
        $this->resetPage();
    }

    public function render()
    {
        $livraisons = Livraison::query()
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('numero_colis', 'like', '%' . $this->search . '%')
                      ->orWhere('livreur', 'like', '%' . $this->search . '%')
                      ->orWhere('destination', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.livraison-list', compact('livraisons'));
    }

    public function edit($id)
    {
        $this->emit('editLivraison', $id);
    }

    public function confirmDelete($id)
    {
        $this->selectedId = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function delete()
    {
        Livraison::destroy($this->selectedId);
        session()->flash('message', 'Livraison supprimée avec succès.');
        $this->selectedId = null;
    }
    
    public function showDetails($id)
    {
        $this->emit('showLivraisonDetails', $id);
    }
}