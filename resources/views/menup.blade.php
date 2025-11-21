<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de suivi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .btn-custom {
            margin: 10px;
            padding: 20px;
            font-size: 1.2rem;
            width: 100%;
            max-width: 500px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
        }
        h1 {
            margin-bottom: 40px;
            color: #343a40;
        }

    </style>

    <style>
    body{
        background-image: url('image/logo.png') !important;
        /* Background image is centered vertically and horizontally at all times */
    background-position: center center !important;

    /* Background image doesn't tile */
    background-repeat: no-repeat !important;

    /* Background image is fixed in the viewport so that it doesn't move when
    the content's height is greater than the image's height */
    background-attachment: fixed !important;

    /* This is what makes the background image rescale based
    on the container's size */
    background-size: contain !important ;

    /* Set a background color that will
    background-color: #464646 !important;
*/
    }

</style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Tableau de suivi</h1>

        <div class="d-grid gap- col-md-6  mx-auto">
            <a href="{{ route('home.appel') }}" class="btn btn-primary btn-custom">
                 Appels à projet / Initiatives
            </a>

            <a href="{{ route('home') }}" class="btn btn-success btn-custom">
                 Projets, Initiatives et Programmes
            </a>

            <a href="{{ route('partenariat.index') }}" class="btn btn-info btn-custom text-white">
                 Conventions de partenariat
            </a>
             <a href="{{ route('user.index') }}" class="btn btn-warning btn-custom text-white">
                Créer un Utilisateur
            </a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
