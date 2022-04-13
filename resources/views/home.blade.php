@extends('layout1')

@section('content')
<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Liste des Projets</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Projets</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container">
        <div class="card card-success card-outline">
            <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                  @foreach ($projets as $projet)
                  <div class="col-12 col-sm-4">
                    <a href="{{ route('go.menu', ['projet_id'=> $projet->id]) }}">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted"><h4>{{ $projet->nom }}</h4></span>
                        {{--  <span class="info-box-number text-center text-muted mb-0">2300</span>  --}}
                      </div>
                    </div>
                </a>
                  </div>
                  @endforeach
              </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
        </div>
    </div>
  </div>
@endsection

