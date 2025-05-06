<x-app-layout>
    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <x-slot name="header">
        <h2 class="h4 text-dark">
            Tableau de bord - Suivi de vos colis
        </h2>
    </x-slot>

    <div class="container py-4">
        <!-- Formulaire de recherche -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">Suivre un nouveau colis</h5>
                <form method="GET" action="">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select name="statut" class="form-select">
                                <option value="">Tous les statuts</option>
                                <option value="En transit" {{ request('statut') === 'En transit' ? 'selected' : '' }}>En transit</option>
                                <option value="En livraison" {{ request('statut') === 'En livraison' ? 'selected' : '' }}>En livraison</option>
                                <option value="Retardé" {{ request('statut') === 'Retardé' ? 'selected' : '' }}>Retardé</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="date" name="date" value="{{ request('date') }}" class="form-control" />
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="recherche" value="{{ request('recherche') }}" class="form-control" placeholder="Numéro de suivi" />
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-primary w-100">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Liste des colis -->
        @forelse ($colis as $c)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h5 class="card-title mb-0">{{ $c->numero_colis ?? '---' }}</h5>
                            <small class="text-muted">Expédié le {{ \Carbon\Carbon::parse($c->date_envoi)->format('d M Y') }}</small>
                        </div>
                        @php
                            $statut = $c->statut ?? 'Inconnu';
                            $progress = match($statut) {
                                'En transit' => 70,
                                'En livraison' => 100,
                                'Retardé' => 50,
                                default => 0,
                            };
                            $badgeClass = match($statut) {
                                'En transit' => 'bg-warning text-dark',
                                'En livraison' => 'bg-success',
                                'Retardé' => 'bg-danger',
                                default => 'bg-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $statut }}</span>
                    </div>

                    <div class="progress mb-2" style="height: 6px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="d-flex justify-content-between text-muted small">
                        <span>Préparation</span>
                        <span>En transit</span>
                        <span>En livraison</span>
                        
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-secondary text-center">
                Aucun colis trouvé.
            </div>
        @endforelse
    </div>
</x-app-layout>
