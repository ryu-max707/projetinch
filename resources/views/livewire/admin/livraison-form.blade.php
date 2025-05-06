<div>
    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label>N° Colis</label>
            <input type="text" class="form-control" wire:model.defer="numero_colis">
            @error('numero_colis') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Livreur</label>
            <input type="text" class="form-control" wire:model.defer="livreur">
            @error('livreur') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Nombre de Colis</label>
            <input type="number" class="form-control" wire:model.defer="colis">
            @error('colis') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Destination</label>
            <input type="text" class="form-control" wire:model.defer="destination">
            @error('destination') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" class="form-control" wire:model.defer="date_livraison">
            @error('date_livraison') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Heure</label>
            <input type="time" class="form-control" wire:model.defer="heure_livraison">
            @error('heure_livraison') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select class="form-control" wire:model.defer="statut">
                <option value="">Choisir un statut</option>
                <option value="En attente">En attente</option>
                <option value="En cours">En cours</option>
                <option value="Terminée">Terminée</option>
            </select>
            @error('statut') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Téléphone (facultatif)</label>
            <input type="text" class="form-control" wire:model.defer="telephone">
        </div>

        <button type="submit" class="btn btn-success w-100">Enregistrer</button>
    </form>
</div>
