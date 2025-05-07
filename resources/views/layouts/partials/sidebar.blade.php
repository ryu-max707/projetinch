@php
    $role = Auth::user()->role ?? null;
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
                <a href="{{ $role === 'admin' ? route('admin.dashboard.livraison')   : route('client.dashboard') }}" class="nav-link link-dark">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Tableau de bord
                </a>
            </li>

            <!-- Colis -->
            <li>
                <a href="{{ $role === 'admin' ? route('admin.colis')  : route('client.notifications') }}" class="nav-link link-dark">
                    <i class="bi bi-box-seam me-2"></i>
                    Colis
                </a>
            </li>

            <!-- Livraisons -->
             
  

@if ($role === 'admin')
<li>
    <a href="{{ route('admin.livraison') }}" class="nav-link link-dark">
        <i class="bi bi-truck me-2"></i>
        Livraisons
    </a>
</li>
@endif


           <!-- Clients (uniquement admin) -->

           @if ($role === 'admin')
<li>
    <a href="{{ route('admin.admin.dashboard') }}" class="nav-link link-dark">
        <i class="bi bi-people me-2"></i>
        Clients
    </a>
</li>
@endif

             

            <!-- Rapports (uniquement admin) -->
             @if ( $role === 'client')
           
            <li>
                <a href="{{  route('client.notifications') }}" class="nav-link link-dark">
                    <i class="bi bi-bell fs-5"></i>
                    notifications
                </a>
            </li>
            @endif
             

            <!-- Paramètres -->
            <li>
                <a href="" class="nav-link link-dark">
                    <i class="bi bi-gear me-2"></i>
                    Paramètres
                </a>
            </li>
        </ul>
    </div>
</div>
