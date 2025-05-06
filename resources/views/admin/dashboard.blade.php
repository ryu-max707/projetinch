{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">Dashboard Admin</h2>
    </x-slot>

    {{-- Bootstrap CSS & Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="container py-4">

        {{-- Statistiques --}}
        <div class="row g-4 mb-4">
            @foreach ($stats as $stat)
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $stat['label'] }}</h6>
                                    <h2 class="card-title mb-0">{{ $stat['value'] }}</h2>
                                </div>
                                <div class="bg-light-subtle p-2 rounded">
                                    <i class="{{ $stat['icon'] }} fs-4 text-primary"></i>
                                </div>
                            </div>
                            <p class="card-text text-success mt-2 mb-0">
                                <i class="bi bi-arrow-up"></i> +{{ $stat['variation'] }}% Ce mois
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Recherche + Bouton Ajouter --}}
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recherche par nom, email...">
                            <button class="btn btn-primary" type="button">Rechercher</button>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
                            <i class="bi bi-plus-lg"></i> Nouveau Client
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Liste Clients avec Livewire --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Liste des Clients</h5>
            </div>
            <div class="card-body p-0">
                @livewire('client-list')
            </div>
            <div class="card-footer">
                {{-- Si besoin : pagination manuelle ici --}}
                {{-- Ex. : {{ $clients->links() }} --}}
            </div>
        </div>

        {{-- Modal : Ajouter un client --}}
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

        {{-- Modal : Modifier un client --}}
        <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    @livewire('client-form', ['mode' => 'edit'])
                </div>
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

        {{-- Scripts Bootstrap + gestion Livewire --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
    </div>
</x-app-layout>
