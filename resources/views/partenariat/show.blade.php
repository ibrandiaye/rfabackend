@extends('layouts.partanariat')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">📄 Détails du Partenariat</h4>
        <div>
            <a href="{{ route('partenariat.edit', $partenariat) }}" class="btn btn-warning btn-sm">✏️ Modifier</a>
            <a href="{{ route('partenariat.index') }}" class="btn btn-secondary btn-sm">⬅️ Retour</a>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6 mb-3">
                <h5 class="text-primary">🧑‍🤝‍🧑 Partenaire</h5>
                <p><strong>Dénomination :</strong> {{ $partenariat->denomination_partenaire }}</p>
                <p><strong>Volet :</strong> {{ $partenariat->volet_partenariat }}</p>
                <p><strong>Personne Contact :</strong> {{ $partenariat->personne_contact }}</p>
                <p><strong>Fonction :</strong> {{ $partenariat->fonction }}</p>
                <p><strong>Téléphone / Email :</strong> {{ $partenariat->telephone_email }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="text-primary">📑 Convention</h5>
                <p><strong>Signature :</strong>
                    <span class="badge {{ $partenariat->signature_convention == 'Oui' ? 'badge-success' : 'badge-danger' }}">
                        {{ $partenariat->signature_convention }}
                    </span>
                </p>
                <p><strong>Date Debut :</strong> {{ $partenariat->date_signature_convention ? $partenariat->date_signature_convention->format('d-m-Y') : '' }}</p>
                 <p><strong>Date Fin :</strong> {{ $partenariat->date_fin ?  $partenariat->date_fin->format('d-m-Y') :  '' }}</p>
                <p><strong>Année :</strong> {{ $partenariat->annee }}</p>
                <p><strong>Durée :</strong> {{ $partenariat->duree_partenariat }} mois</p>
                <p><strong>Feuille de route :</strong>
                    <span class="badge {{ $partenariat->feuille_de_route == 'Oui' ? 'badge-success' : 'badge-secondary' }}">
                        {{ $partenariat->feuille_de_route }}
                    </span>
                </p>

            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6 mb-3">
                <h5 class="text-primary">🎯 Stratégie</h5>
                <p><strong>Axes Collaboration :</strong> <br>{{ $partenariat->axes_collaboration }}</p>

                <p><strong>Axes Plan Stratégique :</strong> {{ $partenariat->axe_plan_strategique }}</p>

                <p><strong>Lignes d’action :</strong> <br>{{ $partenariat->lignes_action_strategique }}</p>
                 <p><strong>ODD :</strong>
                {{ $partenariat->odd  }} &nbsp;&nbsp;&nbsp;
                 </p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="text-primary">📌 Suivi</h5>
                <p><strong>Point Focal ECOPOP :</strong> {{ $partenariat->point_focal_ecopop }}</p>
                <p><strong> Convention :</strong>
                    @if($partenariat->integrer_convention)
                        <a href="{{ asset('document/'.$partenariat->integrer_convention) }}"> 📋 </a>
                    @endif

                </p>
                <p><strong>État d’avancement :</strong> {{ $partenariat->etat_avancement }}</p>
                <p><strong>Commentaire :</strong> <br>{{ $partenariat->commentaire }}</p>
            </div>
        </div>

    </div>
</div>
@endsection
