@extends('layout1')

@section('content')
<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Axe Stratégique</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">menu axe statégique</li>
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
      <div class="card card-success card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">Planification</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-12 col-sm-4">
                <a href="{{ route('axe.index') }}">
                <div class="info-box bg-success">
                  <div class="info-box-content">
                    <span class="info-box-text text-center ">Axes stratégiques</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-4">
                <a href="{{ route('action.index') }}">
                <div class="info-box bg-success">
                  <div class="info-box-content">
                    <span class="info-box-text text-center ">Lignes d’action (LA)</span>
                  </div>
                </div>
            </a>
              </div>
              <div class="col-12 col-sm-4">
                <a href="{{ route('indicateura.index') }}">
                <div class="info-box bg-success">
                  <div class="info-box-content">
                    <span class="info-box-text text-center ">INDICATEURS <br>DE PERFORMANCE</span>
                  </div>
                </div>
            </a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">SUIVI DES REALISATIONS DU PLAN STRATEGIQUE</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <a href="{{ route('resultata.index') }}">
                    <div class="info-box bg-success">
                      <div class="info-box-content">
                        <span class="info-box-text text-center  ">PLAN DE SUIVI</span>
                      </div>
                    </div>
                </a>
                  </div>
              <div class="col-12 col-sm-6">
                <a href="{{ route('resultata.create') }}">
                <div class="info-box bg-success">
                  <div class="info-box-content">
                    <span class="info-box-text text-center ">Fiches de saisi<br>  Plan de suivi</span>
                  </div>
                </div>
            </a>
              </div>

            </div>

            </div>
        </div>

      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card card-success card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Modude de Saisie Planification</h5>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <a href="{{ route('axe.create') }}">
                  <div class="info-box bg-warning">
                    <div class="info-box-content">
                      <span class="info-box-text text-center ">Axes stratégiques</span>
                    </div>
                  </div>
              </a>
                </div>
                <div class="col-12 col-sm-4">
                    <a href="{{ route('action.create') }}">
                    <div class="info-box bg-warning">
                      <div class="info-box-content">
                        <span class="info-box-text text-center ">Lignes d’action (LA)</span>
                      </div>
                    </div>
                </a>
                  </div>
                  <div class="col-12 col-sm-4">
                    <a href="{{ route('indicateura.create') }}">
                    <div class="info-box bg-warning">
                      <div class="info-box-content">
                        <span class="info-box-text text-center ">Indicateur</span>
                      </div>
                    </div>
                </a>
                  </div>
              </div>
          </div>
        </div>
      </div>
{{--
      <div class="col-lg-6">
        <div class="card card-success card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Module de Saisie Suivi Evaluation</h5>
          </div>
          <div class="card-body">
              <div class="row">
              <div class="col-12 col-sm-6">
                  <a href="{{ route('resultat.projet') }}">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center ">Suivi des indicateurs</span>
                    </div>
                  </div>
              </a>
                </div>
                <div class="col-12 col-sm-6">
                  <a href="{{ route('suiviactivite1.create') }}">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center ">Suivi des activités</span>
                    </div>
                  </div>
              </a>
                </div>
              </div>

              </div>
          </div>

        </div>  --}}

    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

