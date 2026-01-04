<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENDA ET ODD - @yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --odd-primary: #1e40af;
            --odd-secondary: #0ea5e9;
            --odd-bg: #f8fafc;
        }
        body {
            background-color: var(--odd-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: var(--odd-primary) !important;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .sidebar {
            height: 100vh;
            position: sticky;
            top: 0;
            background: white;
            border-right: 1px solid #e2e8f0;
            padding-top: 20px;
        }
        .nav-link {
            color: #475569;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 12px;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #f1f5f9;
            color: var(--odd-primary);
        }
        .nav-link i {
            margin-right: 10px;
            width: 20px;
        }
        .stats-card i {
            font-size: 2.5rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 20px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky">
                    <a href="{{ route('menup') }}" class="navbar-brand d-block px-4 mb-4">
                        <img src="{{ asset('image/logo.png') }}" alt="ENDA" height="40" class="me-2">
                        ENDA ET ODD
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('odd.dashboard') ? 'active' : '' }}" href="{{ route('odd.dashboard') }}">
                                <i class="fas fa-chart-line"></i> Tableau de bord
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('odd.projects.*') ? 'active' : '' }}" href="{{ route('odd.projects.index') }}">
                                <i class="fas fa-folder"></i> Projets
                            </a>
                        </li>
                        <hr class="mx-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menup') }}">
                                <i class="fas fa-arrow-left"></i> Menu Principal
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        @yield('actions')
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('scripts')
</body>
</html>
