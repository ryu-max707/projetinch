{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
<div>


    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <div class="container py-4">
        {{-- En-tête --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Dashboard Admin</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                + Nouveau Client
            </button>
        </div>

        {{-- Statistiques --}}
        <div class="row mb-4">
    @foreach ($stats as $stat)
        <div class="col-md-3">
            <div class="bg-white rounded shadow-sm p-3 text-center">
            <i class="{{ $stat['icon'] }} text-primary fs-3 mb-2"></i>
                <h4 class="fw-bold">{{ $stat['value'] }}</h4>
                <p class="mb-0">{{ $stat['label'] }}</p>
                <small class="text-success">+{{ $stat['variation'] }}% ce mois</small>
            </div>
        </div>
    @endforeach
</div>


        {{-- Recherche --}}
        <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Rechercher un client...">
            <button class="btn btn-primary">Rechercher</button>
        </div>

        {{-- Liste des clients via Livewire --}}
        @livewire('client-list')

        {{-- Modal : Ajouter Client --}}
        <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('client-form', ['mode' => 'create'])
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal : Modifier Client --}}
        <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
             
        <div class="modal-dialog">
                <div class="modal-content">
                    <livewire:client-form :mode="'edit'" />
                </div>
                <!-- Bouton Ajouter un client -->
<button wire:click="$emit('resetFormFields')" data-bs-toggle="modal" data-bs-target="#addClientModal">
    Ajouter un client
</button>

            </div>
        </div>

        {{-- Modal : Détails du client --}}
        <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails du client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('client-show')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS Bootstrap --}}
    <script>
    window.addEventListener('close-modal', () => {
        const addModal = bootstrap.Modal.getInstance(document.getElementById('addClientModal'));
        const editModal = bootstrap.Modal.getInstance(document.getElementById('editClientModal'));

        if (addModal) addModal.hide();
        if (editModal) editModal.hide();
    });

     
    Livewire.on('clientUpdated', () => {
    Livewire.emit('refresh');  
});

</script>


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
