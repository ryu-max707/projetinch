<?php

// app/Http/Livewire/ClientShow.php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientShow extends Component
{
    public $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client-show');
    }
}

