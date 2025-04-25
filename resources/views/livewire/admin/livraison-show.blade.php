 

    <div class="container mt-4">
    <h2>Détails de livraison</h2>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Livraison N° {{ $numero_colis }}
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nom du livreur :</strong> {{ $livreur }}</li>
                    <li class="list-group-item"><strong>Nombre de colis :</strong> {{ $colis }}</li>
                    <li class="list-group-item"><strong>Destination :</strong> {{ $destination }}</li>
                    <li class="list-group-item"><strong>date_ livraison :</strong> {{ $date_livraison }}</li>
                    <li class="list-group-item"><strong>date_ livraison :</strong> {{ $heure_livraison }}</li>
                    <li class="list-group-item"><strong>Statut :</strong> {{ $statut }}</li>
                    <li class="list-group-item"><strong>telephone</strong></li>
                    <p><strong>Statut :</strong> {{ $statut }}</p>
       
                </ul>
            </div>
        </div>
    </div>

