<div class="container mt-4">
    <h2>Détails de livraison</h2>

    @if ($livraison)
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Livraison N° {{ $livraison->numero_colis }}
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nom du livreur :</strong> {{ $livraison->livreur }}</li>
                    <li class="list-group-item"><strong>Nombre de colis :</strong> {{ $livraison->colis }}</li>
                    <li class="list-group-item"><strong>Destination :</strong> {{ $livraison->destination }}</li>
                    <li class="list-group-item"><strong>Date de livraison :</strong> {{ $livraison->date_livraison }}</li>
                    <li class="list-group-item"><strong>Heure de livraison :</strong> {{ $livraison->heure_livraison }}</li>
                    <li class="list-group-item"><strong>Statut :</strong> 
                        <span class="badge bg-{{ $livraison->statut === 'Terminée' ? 'success' : 
                            ($livraison->statut === 'En attente' ? 'warning text-info' : 
                            ($livraison->statut === 'En cours' ? 'warning text-dark' : 'secondary')) }}">
                            {{ $livraison->statut }}
                        </span>
                    </li>
                    @if ($livraison->telephone)
                        <li class="list-group-item"><strong>Téléphone :</strong> {{ $livraison->telephone }}</li>
                    @endif
                </ul>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            Sélectionnez une livraison pour voir les détails.
        </div>
    @endif
</div>