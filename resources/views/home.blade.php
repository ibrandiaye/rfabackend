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
        {{--  <div class="card card-success card-outline">
            <div class="card-body">
        <div class="row">
            <div class="col-12  order-2 order-md-1">
              <div class="row">
                  @foreach ($projets as $projet)
                  <div class="col-12 col-sm-2">
                    <a href="{{ route('go.menu', ['projet_id'=> $projet->id]) }}">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted"><h4>{{ $projet->nom }}</h4></span>
                        {{--  <span class="info-box-number text-center text-muted mb-0">2300</span>  -}}
                      </div>
                    </div>
                </a>
                  </div>
                  @endforeach
              </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
        </div>  --}}
        <div class="row">
            @foreach ($projets as $projet)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                <div class="card bg-light">
                  <div class="card-header text-muted border-bottom-0">
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h6 ><b style="color: green; text-align: justify; size: 10px;">{{ $projet->nom }}</b></h6>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small" style="color: black;"><span class="fa-li"><i class="far fa-calendar-alt"></i></span> Durée : {{ $projet->duree }} ans</li>
                          <li class="small" style="color: black;"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Zones d'interventions:  @foreach ($projet->zones as $zone)
                            {{ $zone->region->nom }},
                        @endforeach</li>
                        </ul>
                      </div>
                      <div class="col-5 text-center">
                        <img src="{{ asset('projet_img/'.$projet->logo) }}" alt="" class="img-circle img-fluid">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">

                      <a href="{{ route('go.menu', ['projet_id'=> $projet->id]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i> Suivi évualution
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
        </div>
    </div>
  </div>
@endsection

