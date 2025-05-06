<x-app-layout>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <x-slot name="header">
        <h2 class="h4">Notifications</h2>
    </x-slot>

    <div class="container py-4">
        <!-- Filtres -->
        <form method="GET" action="">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Statut</label>
                            <select class="form-select" name="status">
                                <option value="">Tous les statuts</option>
                                <option value="en_cours" {{ request('status') == 'En transit' ? 'selected' : '' }}>En cours de livraison</option>
                                <option value="retard" {{ request('status') == 'Retardé' ? 'selected' : '' }}>Retard</option>
                                <option value="livre" {{ request('status') == 'En livraison' ? 'selected' : '' }}>Livré</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ request('date') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Recherche</label>
                            <input type="text" class="form-control" name="search" placeholder="Numéro de suivi" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button class="btn btn-primary" type="submit">Filtrer</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Liste des notifications -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Toutes les Notifications</h5>
            </div>
            <div class="list-group list-group-flush">
                @forelse($colis as $item)
                    <div class="list-group-item">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-circle 
                                @if($item->statut == 'En transit') bg-primary bg-opacity-10 
                                @elseif($item->statut == 'Retardé') bg-warning bg-opacity-10 
                                @else bg-success bg-opacity-10 @endif">
                                <i class="fs-4 
                                    @if($item->statut == 'En transit') bi bi-truck text-primary 
                                    @elseif($item->statut == 'Retardé') bi bi-clock text-warning 
                                    @else bi bi-check-circle text-success @endif"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        @if($item->statut == 'En transit')
                                            Colis en cours de livraison
                                        @elseif($item->statut == 'Retardé')
                                            Retard de Livraison
                                        @else
                                            Colis Livré
                                        @endif
                                    </h6>
                                    <small class="text-muted">
                                        @if($item->date_envoi)
                                            {{ $item->date_envoi }}
                                        @else
                                            Non défini
                                        @endif
                                    </small>
                                </div>
                                <p class="mb-0 text-muted">{{ $item->message }}   votre est  colis  </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item text-center text-muted">
                        Aucune notification trouvée.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $colis->withQueryString()->links() }}
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</x-app-layout>
