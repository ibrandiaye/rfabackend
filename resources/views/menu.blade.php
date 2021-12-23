@extends('layout1')

@section('content')
<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> {{ $projet->nom }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ $projet->nom }}</li>
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
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title m-0">Planification</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-12 col-sm-6">
                <a href="{{ route('projet.indicateur', ['projet_id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Cadre Logique/Cadre mesure</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-6">
                <a href="{{ route('activite.projet', ['projet_id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Plan de Travail</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-6">
                <a href="{{ route('indicateur.projet', ['projet_id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Ajouter un Indicateur</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-6">
                <a href="{{ route('liste.activite.projet', ['id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Suivi de la mise oeuvre</span>
                  </div>
                </div>
            </a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">Suivi Evaluation</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-12 col-sm-6">
                <a href="{{ route('resultat.projet', ['projet_id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Suivi des indicateurs</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-6">
                <a href="{{ route('fiche.indicateur.projet', ['projet_id'=>$projet->id]) }}">
                <div class="info-box bg-light">
                  <div class="info-box-content">
                    <span class="info-box-text text-center text-muted">Fiches de suivi des indicateurs</span>
                  </div>
                </div>
            </a>
              </div>
            </div>

            </div>
        </div>

      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

