@extends('appelprojet.welcome')

@section('content')
<div class="content-wrapper">

    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Tableau de bord</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('appel.index') }}" role="button" class="btn btn-primary">LISTE Des appels</a></li>

                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
<div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $nbLoading }}</h3>

          <p>Projets en cours</p>
        </div>
        <div class="icon">
          <i class="ion ion-soup-can-outline"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">Projets en cours <i class="fas fa-arrow-circle-right"></i></a> --}}
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $nbApprouved   }}<sup style="font-size: 20px"></sup></h3>

          <p>Projets Aprouvé</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-checkbox-outline"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{  $nbNotApprouved }}</h3>

          <p>Projet non aprouvé</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-close"></i>
        </div>
        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
      </div>
    </div>
    <!-- ./col -->

  </div>
  <div class="row">
      <div class="col-lg-6">
    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">Nombre de projet Approuvée et Non Approvée</div>
            <div class="card-body">
    <canvas id="myChart" width="200" height="200"></canvas>
            </div>
    </div>

  </div>
  <div class="col-lg-6">
    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">Nombre de projet Approuvée et Non Approvée</div>
            <div class="card-body">
    <canvas id="pie" width="200" height="200"></canvas>
            </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card border-danger border-0">
            <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT du canevas de reporting</div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th>titre</th>
                                <th>theme</th>
                                <th>Date Réception</th>
                                <th>Traitement ou exploitation</th>
                                <th>Réunion Brainstorming</th>
                                <th>document</th>
                                <th>Date Soumission</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($appels as $appel)
                            <tr>
                                <td>{!! $appel->titre !!}</td>
                                <td>{!! $appel->theme !!}</td>
                                <td>{{  Carbon\Carbon::parse( $appel->dater)->format('d-m-Y') }}</td>
                                <td>{{  Carbon\Carbon::parse( $appel->datet)->format('d-m-Y') }}</td>
                                <td>{{  Carbon\Carbon::parse( $appel->dateb)->format('d-m-Y') }}</td>
                                <td><a href="{{ asset('doc/'.$appel->document) }}" ><button class="btn btn-info"><i class="far fa-save"></i><ion-icon name="document-outline"></ion-icon></button></a></td>
                                <td>{{  Carbon\Carbon::parse( $appel->dates)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('appel.edit', $appel->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('appel.show', $appel->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['appel.destroy', $appel->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    {!! Form::close() !!}



                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>



                </div>

            </div>
        </div>
</div>
    </div>
</div>
@endsection
@section('script')

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var ctx1 = document.getElementById('pie').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Non Approuvé', 'Approuve'],
        datasets: [{
            label: 'Soumission ECOPOP',
            data: [{{  $nbNotApprouved }}, {{ $nbApprouved   }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(75, 192, 192, 0.2)'

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var myChart = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ['Non Approuvé', 'Approuve'],
        datasets: [{
            label: 'Soumission ECOPOP',
            data: [{{  $nbNotApprouved }}, {{ $nbApprouved   }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(75, 192, 192, 0.2)'

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
