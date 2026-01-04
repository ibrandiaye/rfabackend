<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Suivi - ENDA ECOPOP</title>
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

        .menu-container {
            max-width: 1000px;
            width: 100%;
        }

        .header {
            text-align: center;
            mb-5;
        }

        .header h1 {
            font-weight: 800;
            color: var(--primary-color);
            letter-spacing: -1px;
            margin-bottom: 30px;
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: var(--secondary-color);
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 2.5rem;
            transition: all 0.3s;
        }

        /* Card Custom Colors */
        .card-appel .icon-circle { background: #eff6ff; color: #3b82f6; }
        .card-projet .icon-circle { background: #f0fdf4; color: #22c55e; }
        .card-convent .icon-circle { background: #f0f9ff; color: #0ea5e9; }
        .card-user .icon-circle { background: #fffbeb; color: #f59e0b; }
        .card-odd .icon-circle { background: #fff1f2; color: #e11d48; }

        .menu-card:hover .icon-circle {
            transform: scale(1.1);
        }

        .menu-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .menu-card p {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 0;
            line-height: 1.5;
        }

        .logout-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            background: white;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
            padding: 8px 18px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 100;
        }

        .logout-btn:hover {
            background: var(--accent-color);
            color: white;
            box-shadow: 0 4px 12px rgba(225, 29, 72, 0.2);
        }

        @media (max-width: 768px) {
            .logout-btn {
                position: relative;
                top: 0;
                right: 0;
                margin-bottom: 20px;
                justify-content: center;
            }
            .header {
                display: flex;
                flex-direction: column-reverse;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <img src="{{ asset('image/logo.png') }}" alt="" class="background-logo">

    <div class="menu-container">
        <div class="header position-relative">
            <a href="{{ route('logout') }}" 
               class="logout-btn"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <img src="{{ asset('image/logo.png') }}" alt="Logo" height="80" class="mb-4">
            <h1>Plateforme de Suivi et Pilotage</h1>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Appels à Projet -->
            <div class="col-md-4">
                <a href="{{ route('home.appel') }}" class="menu-card card-appel">
                    <div class="icon-circle">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Appels à projet</h3>
                    <p>Gestion des initiatives et des appels d'offres en cours.</p>
                </a>
            </div>

            <!-- Projets & Programmes -->
            <div class="col-md-4">
                <a href="{{ route('home') }}" class="menu-card card-projet">
                    <div class="icon-circle">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3>Projets & Programmes</h3>
                    <p>Suivi détaillé des initiatives et des programmes institutionnels.</p>
                </a>
            </div>

            <!-- ODD Platform -->
            <div class="col-md-4">
                <a href="{{ route('odd.dashboard') }}" class="menu-card card-odd">
                    <div class="icon-circle">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <h3>Plateforme ODD</h3>
                    <p>Suivi des Objectifs de Développement Durable et réalisations.</p>
                </a>
            </div>

            <!-- Partenariats -->
            <div class="col-md-4">
                <a href="{{ route('partenariat.index') }}" class="menu-card card-convent">
                    <div class="icon-circle">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Conventions</h3>
                    <p>Gestion des accords de partenariat et conventions signées.</p>
                </a>
            </div>

            <!-- Utilisateurs -->
            <div class="col-md-4">
                <a href="{{ route('user.index') }}" class="menu-card card-user">
                    <div class="icon-circle">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>Utilisateurs</h3>
                    <p>Administration des comptes et accès à la plateforme.</p>
                </a>
            </div>
        </div>

        <div class="text-center mt-5">
            <p class="text-muted small">© {{ date('Y') }} ENDA ECOPOP - Tous droits réservés</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
