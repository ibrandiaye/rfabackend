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
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet->id]) }}" role="button" class="btn btn-success">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('activite.create') }}" role="button" class="btn btn-success">Liste des activités</a></li>
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

     {{--<div class="col-lg-12">
         <div class="card">
            <div class="card-header">
                <h3 class="card-title">Calendrier des activités</h3>

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
    </div>--}}
<div class="col-12">
    <div class="card border-danger border-0">
        <div class="card-header bg-success text-center">Nom Projet : {{ $projet->nom }}</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>Activité</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Responsable</th>
                            <th>Resultats attendus</th>
                             <th>Fiche de Saisi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($activites as $activite)
                        <tr>
                            <td>{{ $activite->nom }}</td>
                            <td>{{ $activite->debut }}</td>
                            <td>{{ $activite->fin }}</td>
                            <td>{{ $activite->responsable }}</td>
                            <td>{!! $activite->rts !!}</td>
                            <td>@if($activite->fs)<a href="{{  asset('fiche/'.$activite->fs)  }}">Fiche de Saisi</a>@endif</td>
                           {{--   <td>
                                @if($activite->etat=='realise')
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
                                <a href="{{ route('activite.edit', $activite->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('activite.show', $activite->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['activite.destroy', $activite->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
    <!-- Timelime example  -->
    <div class="row">
      <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            @foreach ($activites as $activite)
          <!-- timeline time label -->
          <div class="time-label">
            <span class="bg-green">{{ \Carbon\Carbon::parse($activite->debut)->format('d/m/Y')  }}</span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->

          <!-- timeline item -->
          <div>
            <i class="fas fa-calendar bg-maroon"></i>

            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> {{ $activite->responsable }}</span>

              <h3 class="timeline-header"><a href="#">{{ $activite->nom }}</a> </h3>

              <div class="timeline-body">
                {!! $activite->rts !!}
              </div>
            </div>
          </div>
          <!-- END timeline item -->
          @endforeach
          <div>
            <i class="fas fa-clock bg-gray"></i>
          </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
</div>

@endsection
{{--  @section('script')


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
               @foreach($activites as $activite)

               {

                   title : '{{ $activite->nom}}',

                   start : '{{ $activite->debut }}',
                   end: '{{$activite->fin }}',
                   url : '{{ route('activite.show', $activite->id) }}'
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
                @foreach($activites as $activite)

                {

                    title : '{{ $activite->nom}}',

                    start : '{{ $activite->debut }}',
                    end: '{{$activite->fin }}',
                    url : '{{ route('activite.show', $activite->id) }}'
                },

                @endforeach
            ]
        })  -}}
    });

</script>

@endsection
  --}}
