<div class="table-responsive bg-white rounded shadow p-3">
    <h5 class="mb-3">Liste des livraisons</h5>

    <table class="table table-sm table-hover clean-table bg-white shadow-sm rounded">
        <thead class="bg-light text-dark custom-thead">
            <tr>
                <th> #  </th>
                <th> N ° colis</th>
                <th>Livreur</th>
                <th>colis</th>
                <th>Destination</th>
                <th>Statut</th>
                <th>Details</th>
            
            </tr>
        </thead>
        <tbody>
            @if ($livraisons->isNotEmpty())
                @foreach ($livraisons as $livraison)
                    <tr>
                        <td> {{ $loop->iteration  }}</td>
                        <td>{{ $livraison->numero_colis }}</td>
                        <td>{{ $livraison->livreur }}</td>
                        <td>{{ $livraison->colis }} colis</td>
                        <td>{{ $livraison->destination }}</td>
                         
                        <td>
                            <span class="badge bg-{{ $livraison->statut === 'Terminée' ? 'success' : ($livraison->statut === 'En attente' ? 'warning text-info' : ($livraison->statut === 'En cours' ? 'warning text-dark' : 'secondary')) }}">
                                {{ $livraison->statut }}
                            </span>
                        </td>
                        <td>
                        <a href="#" class="text-primary me-2" id="showlivraisonButton" data-bs-toggle="modal" data-bs-target="#livraisonModal">
    <i class="bi bi-eye-fill"></i>  
</a>

<!-- Modal -->
<div class="modal fade" id="livraisonModal" tabindex="-1" aria-labelledby="livraisonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="livraisonModalLabel">Détails du livraison</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            @livewire('admin.livraison-show', ['livraison' => $livraison])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div> 

                            <button class="btn btn-link text-warning me-2" data-bs-toggle="modal" data-bs-target="#editlivraisonModal" wire:click="$emit('editlivraison', {{ $livraison->id }})">
                                <i class="bi bi-pencil-fill"></i>
                            </button>

                            <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Supprimer ce livraison ?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-muted">Aucune livraison trouvé.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
         
</div>
