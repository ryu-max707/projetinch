<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colis Express - Inscription</title>
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
        <!-- Left Side - Blue Background -->
        <div class="col-md-6 bg-primary-custom text-white d-flex flex-column justify-content-center align-items-center p-5">
            <div class="text-center mb-5">
                <i class="bi bi-box-seam display-1"></i>
                <h1 class="mt-3">Colis Express</h1>
                <p class="lead">Rejoignez-nous et profitez d'un service de livraison premium.</p>
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

        <!-- Right Side - Registration Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <div class="text-center mb-4">
                    <i class="bi bi-box-seam text-primary display-1"></i>
                    <h2 class="mt-3">Créez votre compte</h2>
                    <p class="text-muted">Commencez à suivre vos colis dès aujourd'hui</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="exemple@mail.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="client">Client</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">S'inscrire</button>

                    <div class="text-center">
                        <p class="text-muted">ou s'inscrire avec</p>
                        <div class="d-flex gap-2 justify-content-center mb-3">
                            <a href="{{ route('google.auth') }}" class="btn btn-outline-secondary w-50">
                                <i class="bi bi-google me-2"></i>Google
                            </a>
                            <button class="btn btn-outline-secondary w-50" disabled>
                                <i class="bi bi-github me-2"></i>GitHub
                            </button>
                        </div>
                        <button type="button" class="btn btn-link text-primary text-decoration-none p-0" onclick="history.back()">← Se connecter</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
