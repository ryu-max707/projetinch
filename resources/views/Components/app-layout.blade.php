 
    <!DOCTYPE html>
<html lang="fr">
<head>
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
<body class="layout-body" style="display: flex; min-height: 100vh;">

    <div class="sidebar" style="width: 200px; background: #333; color: white;">
        @include('layouts.partials.sidebar')
    </div>

    <div class="main-content" style="flex: 1; padding: 20px; margin: 70px;">
        @include('layouts.partials.navbar')

        <main class="content-placeholder" style="margin-top: 20px;">
            {{ $slot }}
        </main>
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
 
 
 
 
