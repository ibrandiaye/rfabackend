@extends('layout1')

@section('content')
<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">CONSEILS D'UTILISATION DE LA PLATEFORME DE SUIVI-EVALUATION</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">CONSEILS D'UTILISATION</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-success card-outline">
                    <div class="card-header">
                    <h5 class="card-title m-0">CONSEILS D'UTILISATION DE LA PLATEFORME DE SUIVI-EVALUATION</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p>
                                Cette plateforme est destinée au suivi et monitoring de l’ensemble des initiatives d’Enda ECOPOP. Elle permettra d’assurer l’enregistrement de toutes les données et informations en lien avec les interventions de l’organisation (projets, programmes et autres initiatives de développement). Cet outil prendra donc en charge les besoins d’information pour le suivi et l’évaluation des actions déroulées en partenariat avec une panoplie d’acteurs sur le terrain. Elle est conçue pour faciliter la mise à jour régulière et instantanée des données, leur traitement automatique et la visualisation et l’accès en temps réel

                                </p
                                <p>
                                Les profils d’utilisateurs sont définis avec des droits d’accès spécifiques. Chaque utilisateur aura la possibilité de consulter/ télécharger des données, rapports d’activités, images ou vidéos. Après un temps d’inactivité et pour des raisons de sécurité, l’utilisateur concerné sera automatiquement déconnecté.
                                </p>

                                <p>
                                La plateforme est destinée exclusivement au personnel technique d’Enda ECOPOP. Les paramètres d’utilisation sont strictement confidentiels et ne doivent donc pas être partagés avec un externe.
                                </p>
                                <p>
                                Des tableaux de bord illustratifs, des graphiques de synthèse ainsi qu’une cartographie des réalisations seront disponibles pour chaque intervention et pourront être exportés vers Word, Excel et PDF.
                                </p>
                                <p>
                                Elle offre également la possibilité de joindre les rapports d’activités, des images ou vidéos. Pour ces dernières, un lien sera disponible et permettra d’enregistrer les vidéos directement sur Google Drive. Pour garantir la fonctionnalité de la plateforme, nous vous suggérons de ne pas excéder 4 images pertinentes par activité et un maximum de 5 minutes pour les vidéos.
                                <p>
                        </div>
                    </div>
                </div>
        <!-- /.row -->
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->

@endsection

