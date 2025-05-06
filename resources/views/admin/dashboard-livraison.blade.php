<x-app-layout>

{{-- CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-dark">
            {{ __('Dashboard Livraison') }}
        </h2>
    </x-slot>

    <div class="py-4 bg-light">
        <div class="container">

            {{-- Cartes statistiques --}}
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-2">Colis en transit</h6>
                                    <h2 class="mb-0">{{ $colisEnTransit }}</h2>
                                </div>
                                <div class="fs-3 text-primary">📦</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-2">Livraisons du jour</h6>
                                    <h2 class="mb-0">{{ $livraisonsDuJour }}</h2>
                                </div>
                                <div class="fs-3">🚚</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-2">Retards</h6>
                                    <h2 class="mb-0 text-danger">{{ $retards }}</h2>
                                </div>
                                <div class="fs-3 text-danger">📅</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-2">Satisfaction client</h6>
                                    <h2 class="mb-0">{{ $satisfaction }}%</h2>
                                </div>
                                <div class="fs-3 text-danger">💝</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tableau des livraisons --}}
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Livraisons récentes</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>N° Colis</th>
                                <th>Client</th>
                                <th>Destination</th>
                                <th>Statut</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livraisons as $livraison)
                                <tr>
                                    <td>{{ $livraison->numero_colis }}</td>
                                    <td>{{ $livraison->client ?? 'Non défini' }}</td>
                                    <td>{{ $livraison->destination }}</td>
                                    <td>
                                    <span class="badge 
    @if($livraison->statut === 'En livraison') bg-success
    @elseif($livraison->statut === 'En transit') bg-warning text-dark
    @elseif($livraison->statut === 'Retardé') bg-danger
    @else bg-secondary
    @endif">
    {{ ucfirst($livraison->statut) }}
</span>

                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">👁️</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white">
                    <nav>
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>
