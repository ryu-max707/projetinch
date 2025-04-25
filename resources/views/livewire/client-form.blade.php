@if ($successMessage)
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ $successMessage }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif

    <form wire:submit.prevent="save">
        <div class="mb-2">
            <label>Nom</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" wire:model.defer="email" class="form-control">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Type</label>
            <select wire:model.defer="type" class="form-select">
                <option value="">-- Choisir --</option>
                <option value="Particulier">Particulier</option>
                <option value="Professionnel">Professionnel</option>
                <option value="Premium">Premium</option>
            </select>
            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Zone</label>
            <input type="text" wire:model.defer="zone" class="form-control">
            @error('zone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-2">
            <label>Colis</label>
            <input type="number" wire:model.defer="colis" class="form-control">
            @error('colis') <small class="text-danger">{{ $message }}</small> @enderror
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
                <option value="Actif">Actif</option>
                <!-- <option value="En attente">En attente</option> -->
                <option value="Inactif">Inactif</option>
            </select>
            @error('statut') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mt-3 d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">
                {{ $client_id ? 'Mettre à jour' : 'Ajouter' }}
            </button>
        </div>
    </form>
 
</div>
@if ($successMessage)
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ $successMessage }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
@endif


 