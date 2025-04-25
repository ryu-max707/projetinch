<div class="table-responsive bg-white rounded shadow p-3">
    <h5 class="mb-3">Liste des Clients</h5>

    <table class="table table-sm table-hover clean-table bg-white shadow-sm rounded">
        <thead class="bg-light text-dark custom-thead">
            <tr>
                <th> N °</th>
                <th>Client</th>
                <th>Type</th>
                <th>Colis</th>
                <th>Zone</th>
                <th>Statut</th>
                <th>Détails</th>
            </tr>
        </thead>
        <tbody>
            @if ($clients->isNotEmpty())
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $loop->iteration + ($clients->currentPage() - 1) * $clients->perPage() }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->type }}</td>
                        <td>{{ $client->colis }} colis</td>
                        <td>{{ $client->zone }}</td>
                        <td>
                            <span class="badge bg-{{ $client->statut === 'Actif' ? 'success' : ($client->statut === 'En attente' ? 'warning text-dark' : 'secondary') }}">
                                {{ $client->statut }}
                            </span>
                        </td>
                        <td>
                        <a href="#" class="text-primary me-2" id="showClientButton" data-bs-toggle="modal" data-bs-target="#clientModal">
    <i class="bi bi-eye-fill"></i>  
</a>

<!-- Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Détails du client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            @livewire('client-show', ['client' => $client])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div> 

                            <button class="btn btn-link text-warning me-2" data-bs-toggle="modal" data-bs-target="#editClientModal" wire:click="$emit('editClient', {{ $client->id }})">
                                <i class="bi bi-pencil-fill"></i>
                            </button>

                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Supprimer ce client ?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-muted">Aucun client trouvé.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $clients->links() }}
    </div>
</div>
