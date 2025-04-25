 
<div class="container mt-4">
    <h2>Détails du client</h2>
    <div class="card p-4">
        <p><strong>Nom :</strong> {{ $client->name }}</p>
        <p><strong>Email :</strong> {{ $client->email }}</p>
        <p><strong>Type :</strong> {{ $client->type }}</p>
        <p><strong>Zone :</strong> {{ $client->zone }}</p>
        <p><strong>Colis :</strong> {{ $client->colis }}</p>
        <p><strong>Téléphone :</strong> {{ $client->telephone }}</p>
        <p><strong>Statut :</strong> {{ $client->statut }}</p>
        <p><strong>Créé le :</strong> 
            {{ $client->created_at ? $client->created_at->format('d/m/Y H:i') : 'Date inconnue' }}
        </p>

        <!-- <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Retour</a> -->
    </div>
</div>
 
