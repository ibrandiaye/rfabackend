@extends('layout')
@section('calendar')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    fieldset {
      background-color: #eeeeee;
      display: block;
      margin-left: 2px;
      margin-right: 2px;
      padding-top: 0.35em;
      padding-bottom: 0.625em;
      padding-left: 0.75em;
      padding-right: 0.75em;
      border: 2px groove (internal value);
    }

    legend {
      background-color: gray;
      color: white;
      padding: 5px 10px;
    }
    </style>
@endsection


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Liste des Activités de {{ $projet->nom }}</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-primary">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('suiviActivite.create',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-primary">Liste des activités</a></li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-lg-12">
    <div class="row">
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
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
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Caliendrier Réservation</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div id='calendar'></div>
            </div>
            <div class="card-footer">

            </div>
    </div>
    </div>

<div class="col-12">

    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">Nom Projet : {{ $projet->nom }}</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>Activité</th>
                            <th>Date</th>
                            <th>Resultat</th>
                            <th>Observation</th>
                            {{--  <th>Etat</th>  --}}
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
                           {{--   <td>
                                @if($suiviActivite->etat=='realise')
                                <span class="badge badge-success">
                                    Réalisé
                                    </span>
                               @else
                               <span class="badge badge-danger">
                                   non Réalisé
                               </span>
                            @endif
                            </td>  --}}
                            <td>
                                <a href="{{ route('suiviactivite.edit', [$suiviActivite->id,$projet->id]) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('suiviActivite.show', $suiviActivite->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
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
</div>

@endsection
@section('script')


  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale-all.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
           // put your options and callbacks here
           initialView: 'dayGridMonth',
           locale: 'fr',
           headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'listWeek,dayGridMonth'
          },
          // initialView: 'dayGridMonth',
           events : [
               @foreach($suiviActivites as $suiviActivite)

               {

                   title : '{{ $suiviActivite->noma}}',

                   start : '{{ $suiviActivite->dater }}',
                   end: '{{$suiviActivite->dater }}',
                  // url : '{{ route('suiviActivite.show', $suiviActivite->id) }}'
               },

               @endforeach
           ]
          });

          calendar.render();
       {{--   $('#calendar').fullCalendar({
            // put your options and callbacks here
            timeZone: 'UTC',
            initialView: 'dayGridMonth',
            locale: 'fr',
           // initialView: 'dayGridMonth',
            events : [
                @foreach($suiviActivites as $suiviActivite)

                {

                    title : '{{ $suiviActivite->nom}}',

                    start : '{{ $suiviActivite->debut }}',
                    end: '{{$suiviActivite->fin }}',
                    url : '{{ route('suiviActivite.show', $suiviActivite->id) }}'
                },

                @endforeach
            ]
        })  --}}
    });

</script>

@endsection
