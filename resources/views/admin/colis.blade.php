<x-app-layout>
    <div class="container py-4">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        {{-- Tableau des colis --}}
        @livewire('admin.colis-list')

        {{-- Modals ajout/modification (si tu utilises des modals dans layout, insère les ici aussi) --}}
        
        {{-- JS Bootstrap + Livewire Events --}}
        <script>
            // Événement pour fermer les modals Bootstrap
            window.addEventListener('close-modal', () => {
                let modals = ['addLivraisonModal', 'editLivraisonModal'];
                modals.forEach(id => {
                    const modalEl = document.getElementById(id);
                    if (modalEl) {
                        const modalInstance = bootstrap.Modal.getInstance(modalEl);
                        if (modalInstance) modalInstance.hide();
                    }
                });
            });

            // Si tu veux rafraîchir des composants Livewire automatiquement
            Livewire.on('refresh', () => {
                Livewire.emit('refresh');
            });
        </script>

        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</x-app-layout>
