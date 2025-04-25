<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Client;

class ClientList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Pour un style Bootstrap

    protected $listeners = ['clientUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.client-list', [
            'clients' => Client::latest()->paginate(10),
        ]);
    }
}
