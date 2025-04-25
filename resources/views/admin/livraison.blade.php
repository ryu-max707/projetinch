 

<x-app-layout>
    
    <div class="container py-4">

        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        {{-- Titre et bouton --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Livraisons</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLivraisonModal" wire:click="$emit('resetFormFields')">
                + Ajouter livraison
            </button>
        </div>

        {{-- Message Flash --}}
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Tableau des livraisons --}}
        @livewire('admin.livraison-list')

        {{-- Modal : Ajouter livraison --}}
        <div class="modal fade" id="addLivraisonModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter une livraison</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('admin.livraison-form', ['mode' => 'create'])
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal : Modifier livraison --}}
        <div class="modal fade" id="editLivraisonModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    @livewire('admin.livraison-form', ['mode' => 'edit'])
                </div>
            </div>
        </div>

        {{-- Modal : Détails livraison --}}
        <div class="modal fade" id="livraisonModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Détails de la livraison</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('admin.livraison-show')
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- JS Bootstrap + Livewire Events --}}
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

        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</x-app-layout>
