@php
    $role = Auth::user()->role ?? null;
    $currentRoute = Route::currentRouteName();
@endphp

<div class="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; min-height: 100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">TRACKRY</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <!-- Tableau de bord -->
            <li class="nav-item">
                @php
                    $dashboardRoute = $role === 'admin' ? 'admin.dashboard.livraison' : 'client.dashboard';
                    $isDashboardActive = $currentRoute === $dashboardRoute;
                @endphp
                <a href="{{ route($dashboardRoute) }}" class="nav-link {{ $isDashboardActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Tableau de bord
                </a>
            </li>

            <!-- Colis -->
            @if ($role === 'admin')
            <li>
                @php 
                     
                    $isColisActive = $currentRoute === 'admin.colis';
                @endphp
                <a href="{{ route('admin.colis') }}" class="nav-link {{ $isColisActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-box-seam me-2"></i>
                    Colis
                </a>
            </li>
            @endif

            <!-- Livraisons (uniquement admin) -->
            @if ($role === 'admin')
            <li>
                @php
                    $isLivraisonActive = $currentRoute === 'admin.livraison';
                @endphp
                <a href="{{ route('admin.livraison') }}" class="nav-link {{ $isLivraisonActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-truck me-2"></i>
                    Livraisons
                </a>
            </li>
            @endif

            <!-- Clients (uniquement admin) -->
            @if ($role === 'admin')
            <li>
                @php
                    $isClientsActive = $currentRoute === 'admin.admin.dashboard';
                @endphp
                <a href="{{ route('admin.admin.dashboard') }}" class="nav-link {{ $isClientsActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-people me-2"></i>
                    Clients
                </a>
            </li>
            @endif

            <!-- Notifications (uniquement client) -->
            @if ($role === 'client')
            <li>
                @php
                    $isNotificationsActive = $currentRoute === 'client.notifications';
                @endphp
                <a href="{{ route('client.notifications') }}" class="nav-link {{ $isNotificationsActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-bell fs-5"></i>
                    Notifications
                </a>
            </li>
            @endif

            <!-- Paramètres -->
            <li>
                @php
                    $isSettingsActive = $currentRoute === 'settings'; // Remplacez par le nom de votre route de paramètres
                @endphp
                <a href="#" class="nav-link {{ $isSettingsActive ? 'active' : 'link-dark' }}">
                    <i class="bi bi-gear me-2"></i>
                    Paramètres
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .nav-link.active {
        background-color: #0d6efd !important; /* Couleur bleue de Bootstrap */
        color: white !important;
    }
    
    .nav-link {
        border-radius: 5px;
        margin-bottom: 5px;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover:not(.active) {
        background-color: rgba(13, 110, 253, 0.1);
    }
</style>