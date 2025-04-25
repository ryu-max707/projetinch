<div>
    <form wire:submit.prevent="save">
        <div class="mb-2">
            <label>Numéro du colis</label>
            <input type="text" wire:model.defer="numero_colis" class="form-control">
            @error('numero_colis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Nom du Livreur</label>
            <input type="text" wire:model.defer="livreur" class="form-control">
            @error('livreur') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Colis</label>
            <input type="number" wire:model.defer="colis" class="form-control">
            @error('colis') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Destination</label>
            <input type="text" wire:model.defer="destination" class="form-control">
            @error('destination') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Date de Livraison</label>
            <input type="date" wire:model.defer="date_livraison" class="form-control">
            @error('date_livraison') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Heure de Livraison</label>
            <input type="time" wire:model.defer="heure_livraison" class="form-control">
            @error('heure_livraison') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Téléphone</label>
            <input type="text" wire:model.defer="telephone" class="form-control">
            @error('telephone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Statut</label>
            <select wire:model.defer="statut" class="form-select">
                <option value="">-- Choisir --</option>
                <option value="En cours">En cours</option>
                <option value="En attente">En attente</option>
                <option value="Terminé">Terminé</option>
            </select>
            @error('statut') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">
                {{ $livraisonId ? 'Mettre à jour' : 'Ajouter' }}
            </button>
        </div>
    </form>

    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif
</div>
