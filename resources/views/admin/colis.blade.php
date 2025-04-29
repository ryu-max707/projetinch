 

<x-app-layout>
    
    <div class="container py-4">

        {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

      

        {{-- 
    

        {{-- Tableau des coliss --}}
        @livewire('admin.colis-list')

        
        

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
