<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRACKRY - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .bg-primary-custom {
            background-color: #0d6efd;
        }
        .feature-icon {
            font-size: 2rem;
            color: white;
        }
        .login-feature {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Partie gauche (visuelle) -->
        <div class="col-md-6 bg-primary-custom text-white d-flex flex-column justify-content-center align-items-center p-5">
            <div class="text-center mb-5">
                <i class="bi bi-box-seam display-1"></i>
                <h1 class="mt-3">TRACKRY</h1>
                <p class="lead">Suivez vos colis en temps réel et gérez vos livraisons avec facilité.</p>
            </div>

            <div class="row w-100">
                <div class="col-6">
                    <div class="login-feature">
                        <i class="bi bi-search feature-icon"></i>
                        <h5 class="mt-3">Suivi précis</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="login-feature">
                        <i class="bi bi-truck feature-icon"></i>
                        <h5 class="mt-3">Livraison rapide</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="login-feature">
                        <i class="bi bi-bell feature-icon"></i>
                        <h5 class="mt-3">Notifications</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div class="login-feature">
                        <i class="bi bi-headset feature-icon"></i>
                        <h5 class="mt-3">Support 24/7</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partie droite (connexion) -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <div class="text-center mb-4">
                    <i class="bi bi-box-seam text-primary display-1"></i>
                    <h2 class="mt-3">Connectez-vous à votre compte</h2>
                    <p class="text-muted">Accédez à votre espace pour suivre vos colis</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">Mot de passe</label>
                            <a href="#" class="text-primary text-decoration-none">Mot de passe oublié?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Se souvenir de moi</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Se connecter</button>

                    <div class="text-center">
                        <p class="text-muted">ou continuer avec</p>
                        <div class="d-flex gap-2 justify-content-center mb-3">
                            <a href="{{ route('google.auth') }}" class="btn btn-outline-danger w-50">
                                <i class="bi bi-google me-2"></i> Google
                            </a>
                            <a href="#" class="btn btn-outline-dark w-50">
                                <i class="bi bi-github me-2"></i> GitHub
                            </a>
                        </div>
                        <p class="mb-0">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-primary text-decoration-none">S'inscrire</a></p>
                    </div>
                </form>

                <!-- Bouton retour -->
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-link text-primary text-decoration-none p-0" onclick="history.back()">← Retour</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
