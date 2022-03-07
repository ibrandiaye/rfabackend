@extends('layout')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>



@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $projets->nom }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('go.menu', ['projet_id'=>$projet_id]) }}">Accueil</a></li>
                        <li class="breadcrumb-item active">BIENVENUE</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ $nbActivite }}</h3>

                    <p>Activités prévus</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-calendar"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $nbSuiviActivite }}</h3>

                  <p>Activités realisé</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <div>

            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $nbEcart }}</h3>

                  <p>Activites non realisé</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6"">
                <canvas id="myChart" width="100%" height="100%"></canvas>
            </div>
            <!-- ./col -->
          </div>
            <div class="row">
                @foreach ($indicateurs as $key=> $indicateur)
                    <div class="col-4">
                        <p>{{ $indicateur->indicateur }}</p>
                        <canvas id="myChart{{ $key }}" width="400" height="400"></canvas>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">Fiche de suivi des activités de {{ $projet->nom }}</div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Activité</th>
                                            <th>Date</th>
                                            <th>Resultat</th>
                                            <th>Observation</th>
                                            <th>Niveau de réalisation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($suiviActivites as $suiviActivite)
                                        <tr>
                                            <td>{{ $suiviActivite->noma }}</td>
                                            <td>{{ $suiviActivite->dater }}</td>
                                            <td>{!! $suiviActivite->resultat !!}</td>
                                            <td>{!! $suiviActivite->observation !!}</td>
                                            <td>
                                               {{ $suiviActivite->niveaur }}
                                            </td>
                                            <td>
                                                <a href="{{ route('suiviactivite.edit', [$suiviActivite->id,$projet->id]) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                {{-- <a href="{{ route('suiviActivite.show', $suiviActivite->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a> --}}
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['suiviActivite.destroy', $suiviActivite->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
                    <div class="col-12">
                    <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">Fiche de suivi des indicateurs</div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>

                                            <th>Indicateur</th>
                                            <th>Valeur Cible</th>
                                            <th>Valeur atteinte</th>
                                            <th>Ecart</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($indicateurs as $indicateur)
                                        <tr>
                                            <td>{{ $indicateur->indicateur }}</td>
                                            <td>{{ $indicateur->cible }}</td>
                                            <td>{{ $indicateur->sum ?  $indicateur->sum  : 0}}</td>
                                            <td>{{$indicateur->cible - $indicateur->sum }}</td>
                                            <td>
                                               {{--  <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                {!! Form::close() !!} --}}
                                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id]) }}" class="btn btn-info">Résultats</a>


                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                {!! Form::close() !!}
                                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id]) }}" class="btn btn-info">Résultats</a>


                                            </td> --}}

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>



                            </div>

                        </div>


                    </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">

                            <div id="address-map" style="height: 700px"></div>

                </div>
            </div>
    </section>
        </div>
        <input type="hidden" value="15.3893489" id="latitude">
        <input type="hidden" value="-14.7824247" id="longitude">
@endsection
@section('script')
<script>
    @foreach ( $indicateurs as $key=> $indicateur )


const ctx{{ $key }} = document.getElementById('myChart{{ $key }}').getContext('2d');
const myChart{{ $key }} = new Chart(ctx{{ $key }}, {
    type: 'bar',
    data: {
        labels: ['Valeur Cible', 'Valeur atteinte', 'Ecart'],
        datasets: [{
            label: 'Indicateur',
            data: ['{{ $indicateur->cible }}', '{{ $indicateur->sum ?  $indicateur->sum  : 0}}', '{{$indicateur->cible - $indicateur->sum }}'],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)'
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
@endforeach
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Activités prévus', 'Activités realisé', 'Activites non realisé'],
        datasets: [{
            label: 'Activité',
            data: ['{{ $nbActivite }}', '{{ $nbSuiviActivite }}', '{{ $nbEcart }}'],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
})

var map = L.map('address-map').setView([parseFloat(document.getElementById('latitude').value),parseFloat(document.getElementById('longitude').value)],8);
L.tileLayer('https://api.maptiler.com/maps/streets/256/{z}/{x}/{y}.png?key=r7UvRXibthwur7YWRkfQ',{
    attribution : '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
}).addTo(map);
var greenIcon = L.icon({
    iconUrl: '{{ asset('assets/dist/img/danger.png') }}',


   iconSize:     [28, 30], // size of the icon
   {{--  shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor --}}
});
@foreach ($listCommune as $commune )

var marker = L.marker([parseFloat({{ $commune->latitude }}),parseFloat({{ $commune->longitude }} )]).addTo(map);
marker.bindPopup('  <h6> Commune de {{ $commune->nomc }}</h6>@foreach ($commune->indicateur as  $indicateur)'+
'<p> Nom : {{ $indicateur->indicateur }}</p>'+
'<p> Valeur atteint : {{ $indicateur->rts }}</p>'+
'@endforeach' ).openPopup();
@endforeach





</script>

@endsection



