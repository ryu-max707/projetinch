<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Livraison') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Statistiques --}}
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="text-muted">Colis en transit</h6>
                            <h2>{{ $colisEnTransit }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="text-muted">Livraisons du jour</h6>
                            <h2>{{ $livraisonsDuJour }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="text-muted">Retards</h6>
                            <h2 class="text-danger">{{ $retards }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="text-muted">Satisfaction client</h6>
                            <h2>{{ $satisfaction }}%</h2>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tableau des livraisons --}}
            <div class="card">
                <div class="card-header">Livraisons récentes</div>
                <div class="table-responsive">
                    <table class="table table-hover">
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
                                    <td>{{ $livraison->client->nom ?? 'Non défini' }}</td>
                                    <td>{{ $livraison->destination }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($livraison->statut == 'en livraison') bg-success 
                                            @elseif($livraison->statut == 'en transit') bg-warning 
                                            @else bg-danger @endif">
                                            {{ ucfirst($livraison->statut) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('livraison.details', $livraison->id) }}" class="btn btn-sm btn-outline-primary">
                                            👁️
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
