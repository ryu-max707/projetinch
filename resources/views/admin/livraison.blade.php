<x-app-layout>
    {{-- Slot d'en-tête comme dans dashboard --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion des Livraisons
        </h2>
    </x-slot>

    {{-- Contenu principal --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Titre et bouton --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4">Liste des Livraisons</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLivraisonModal" wire:click="$emit('resetFormFields')">
                    + Nouvelle livraison
                </button>
            </div>
 

            {{-- Tableau des livraisons --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Liste des Livraisons</h5>
                    @livewire('admin.livraison-list')
                </div>
            </div>

        </div>
    </div>

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
            const addModal = bootstrap.Modal.getInstance(document.getElementById('addLivraisonModal'));
            const editModal = bootstrap.Modal.getInstance(document.getElementById('editLivraisonModal'));

            if (addModal) addModal.hide();
            if (editModal) editModal.hide();
        });

        Livewire.on('refreshLivraisons', () => {
    Livewire.emit('refreshLivraisons');
});

    </script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
