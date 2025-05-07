<div>
    <div class="card mb-3">
        <div class="card-body">
            <!-- Correction : Supprimer wire:input="updatedSearch" -->
            <!-- Utilisez wire:model.debounce.300ms ou wire:model pour une mise à jour immédiate -->
            <input type="text" class="form-control" placeholder="Rechercher une livraison..." 
                wire:model.debounce.300ms="search">
        </div>
    </div>

    <div class="table-responsive bg-white rounded shadow p-3">
        <h5 class="mb-3">Liste des livraisons</h5>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-sm table-hover clean-table bg-white shadow-sm rounded">
            <thead class="bg-light text-dark custom-thead">
                <tr>
                    <th>#</th>
                    <th>N° colis</th>
                    <th>Livreur</th>
                    <th>Colis</th>
                    <th>Destination</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($livraisons->isNotEmpty())
                    @foreach ($livraisons as $livraison)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $livraison->numero_colis }}</td>
                            <td>{{ $livraison->livreur }}</td>
                            <td>{{ $livraison->colis }} colis</td>
                            <td>{{ $livraison->destination }}</td>
                            <td>
                                <span class="badge bg-{{ $livraison->statut === 'Terminée' ? 'success' : 
                                    ($livraison->statut === 'En attente' ? 'warning text-info' : 
                                    ($livraison->statut === 'En cours' ? 'warning text-dark' : 'secondary')) }}">
                                    {{ $livraison->statut }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-link text-primary me-2" 
                                        wire:click="showDetails({{ $livraison->id }})"
                                        data-bs-toggle="modal" data-bs-target="#livraisonModal">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                
                                <button class="btn btn-link text-warning me-2" 
                                        wire:click="edit({{ $livraison->id }})"
                                        data-bs-toggle="modal" data-bs-target="#editlivraisonModal">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <button type="button" class="btn btn-link p-0 text-danger" 
                                        wire:click="confirmDelete({{ $livraison->id }})">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-muted">Aucune livraison trouvée.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mt-3">
            {{ $livraisons->links() }}
        </div>
    </div>

<!-- Exemple dans la liste -->
<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#livraisonModal"
    wire:click="$emit('showLivraisonDetails', {{ $livraison->id ?? 0}})">
     
</button>


    <!-- Script pour la confirmation de suppression -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('show-delete-confirmation', event => {
                if (confirm('Êtes-vous sûr de vouloir supprimer cette livraison?')) {
                    Livewire.emit('delete');
                }
            });
        });
    </script>
</div>