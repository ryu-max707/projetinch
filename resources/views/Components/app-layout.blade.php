 
    <!DOCTYPE html>
<html lang="fr">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
    <link rel="stylesheet" type="text/css" href="{{asset ('assets/css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar-navbar.css') }}">
    @livewireStyles
</head>
    @livewireStyles
</head>
<body class="layout-body" >
<div style="display: flex;"> 
    <div class="sidebar" style="width: 200px; background: #333; color: white;">
        @include('layouts.partials.sidebar')
    </div>

    <div class="main-content" style=" padding: 20px;">
        @include('layouts.partials.navbar')

        <main class="content-placeholder" style="margin-top: 20px;">
            {{ $slot }}
        </main>
    </div>
</div>

    @livewireScripts
</body>



<style>


.clean-table td,
.clean-table th {
    border-left: none !important;
    border-right: none !important;
}

.clean-table thead {
    background-color: #f8f9fa;
}

.clean-table tbody tr:hover {
    background-color: #f1f3f5;
}

.clean-table th {
    font-weight: 600;
}

.custom-thead th {
    font-weight: normal !important; /* enlève le gras */
    background-color: #e9ecef !important; /* gris clair */
    color: #495057 !important; /* gris foncé pour le texte */
}
 

</style>
</html>
 
 
 
 
