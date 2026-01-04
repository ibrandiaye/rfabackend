<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ENDA ECOPOP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0f172a;
            --secondary-color: #3b82f6;
            --accent-color: #e11d48;
            --bg-color: #f1f5f9;
        }

        body {
            background: var(--bg-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .background-logo {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.05;
            z-index: -1;
            max-width: 600px;
            pointer-events: none;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
        }

        .login-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            height: 80px;
            margin-bottom: 20px;
        }

        .login-logo h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .login-logo p {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.9rem;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s;
        }

        .form-control:focus {
            background-color: white;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .input-group-text {
            background: none;
            border: none;
            color: #94a3b8;
        }

        .btn-login {
            background: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            width: 100%;
            margin-top: 20px;
            transition: all 0.2s;
        }

        .btn-login:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }

        .forgot-password {
            text-align: center;
            margin-top: 24px;
        }

        .forgot-password a {
            color: var(--secondary-color);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #64748b;
        }

        .alert-error {
            background-color: #fff1f2;
            border: 1px solid #fecdd3;
            color: #e11d48;
            border-radius: 12px;
            padding: 12px;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <img src="{{ asset('image/logo.png') }}" alt="" class="background-logo">

    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <img src="{{ asset('image/logo.png') }}" alt="Logo ECOPOP">
                <h2>Bienvenue</h2>
                <p>Plateforme de Suivi Évaluation des interventions de Enda ECOPOP</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                @if ($errors->any())
                    <div class="alert-error">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Identifiants incorrects. Veuillez réessayer.
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="form-label">Adresse E-mail</label>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="votre@email.com">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    Se connecter <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>

            @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                </div>
            @endif
        </div>

        <div class="text-center mt-4 text-muted small">
            © {{ date('Y') }} ENDA ECOPOP - Tous droits réservés
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
