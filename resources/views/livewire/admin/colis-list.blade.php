<div class="container py-4">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Header avec bouton aligné à droite -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Gestion des Colis</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#colisModal">
            + Ajouter un colis
        </button>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <!-- Champ de recherche lié à la propriété search -->
                        <input type="text" class="form-control" placeholder="Recherche par numéro, client, destination..." 
                               wire:model.debounce.300ms="search">
                        <!-- On peut supprimer le bouton car la recherche est désormais dynamique -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message succès -->
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="colisModal" tabindex="-1" aria-labelledby="colisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="colisModalLabel">{{ $isEditMode ? 'Modifier un colis' : 'Ajouter un nouveau colis' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                        <div class="row mb-3">
                            <div class="col">
                                <input wire:model="numero_colis" type="text" class="form-control" placeholder="Numéro du colis">
                                @error('numero_colis') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col">
                                <input wire:model="client" type="text" class="form-control" placeholder="Client">
                                @error('client') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <input wire:model="destination" type="text" class="form-control" placeholder="Destination">
                                @error('destination') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col">
                                <input wire:model="date_envoi" type="date" class="form-control">
                                @error('date_envoi') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <select wire:model="statut" class="form-control">
                                <option value="">-- Sélectionnez le statut --</option>
                                <option value="En livraison">En livraison</option>
                                <option value="En transit">En transit</option>
                                <option value="Retardé">Retardé</option>
                            </select>
                            @error('statut') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ $isEditMode ? 'Mettre à jour' : 'Ajouter' }}
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetFields">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau -->
    <div class="card">
        <div class="card-header bg-white">
            <h2 class="h5 mb-0">Liste des Colis</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th>Numéro</th>
                        <th>Client</th>
                        <th>Destination</th>
                        <th>Date d'envoi</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colis as $c)
                        <tr>
                            <td>{{ $c->numero_colis }}</td>
                            <td>{{ $c->client }}</td>
                            <td>{{ $c->destination }}</td>
                            <td>{{ \Carbon\Carbon::parse($c->date_envoi)->format('d/m/Y') }}</td>
                            <td>
                                @if($c->statut == 'En livraison')
                                    <span class="badge rounded-pill bg-success bg-opacity-10 text-success px-3">{{ $c->statut }}</span>
                                @elseif($c->statut == 'En transit')
                                    <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning px-3">{{ $c->statut }}</span>
                                @else
                                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger px-3">{{ $c->statut }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click="edit({{ $c->id }})" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#colisModal">✏️</button>
                                    <button wire:click="delete({{ $c->id }})" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Confirmer la suppression ?')">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($colis->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center py-3">Aucun colis trouvé.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white">
            <nav>
                {{ $colis->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>
    
    <!-- Script pour fermer le modal après actions -->
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('colisAdded', function () {
                $('#colisModal').modal('hide');
            });
            
            Livewire.on('colisUpdated', function () {
                $('#colisModal').modal('hide');
            });
        });
    </script>
</div>