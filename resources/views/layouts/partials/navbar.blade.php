<div class="flex-grow-1 p-3">
    <!-- Top bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="input-group" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Rechercher un colis...">
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>

        <!-- Notifications, profil et logout -->
        <div class="d-flex align-items-center gap-3">
            <!-- Notifications -->
            <div class="position-relative">
                
                <a href="{{ route('client.notifications') }}"> <i class="bi bi-bell fs-5"></i></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    3
                </span>
            </div>

            <!-- Avatar -->
            <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg" alt="Profile" class="rounded-circle" width="40" height="40">

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i>  
                </button>
            </form>
        </div>
    </div>
</div>
