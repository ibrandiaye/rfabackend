@extends('layout')
@section("css")
{{--  <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />



<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />

<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />  --}}
@endsection
@section('title', '| indicateur')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Suivi des indicateurs @if($annee)
                                    pour l'année {{ $annee }}
                                @endif  </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('indicateur.create') }}" role="button" class="btn btn-success">Enregistrer indicateur</a></li>
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

    <div class="col-md-12">
        @if($projet->typecadre=="Cadre de  resultat")
        <fieldset>
            <legend>Recherche par année:</legend>
          <form action="{{ route('search.resultat') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-5">

                    <div class="form-group">
                        <label> Année:</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-calendar"></i>
                            </span>
                          </div>
                          <select class="form-control" name="annee" required="">
                            <option value="">Selectionnez</option>
                            @for ($i=1; $i <= $projet->duree; $i++)
                            <option value="{{$i}}">annee {{$i}}</option>
                            @endfor

                        </select>
                        <input type="hidden" value="{{ $projet->id }}" name="projet_id">
                          <button type="submit" class="btn btn-success btn btn-sm "> Rechercher</button>
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>
            </div>

          </form>
        </fieldset>
        @endif

            <form action="{{ route('search.periode.resultat') }}" method="POST">
                @csrf
                <div class="form-group">
        <div class="col-sm-6">


            <input type="hidden" id="from" name="from"  value="{{ old('from') }}"  required>
            <input type="hidden" id="to" name="to"  value="{{ old('to') }}"  required>


                <div class="input-group">
                  <div class="input-group-prepend">
                    <label> Periode:</label>
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" name="daterange" class="form-control float-right" id="reservation">
                  <button type="submit" class="btn btn-success btn  "> Rechercher</button>
                </div>
                <!-- /.input group -->
              </div>


              <input id="projet_id" type="hidden" value="{{ $projet->id }}" name="projet_id">
        </div>
        </form>

      </div>
    <div class="col-12">
        <div class="row">
            @foreach ($indicateurs as $key=> $indicateur)
                <div class="col-4">
                    <p>{{ $indicateur->indicateur }}</p>
                    <canvas id="myChart{{ $key }}" width="400" height="400"></canvas>
                </div>
                <div class="col-4">
                    <p>{{ $indicateur->indicateur }}</p>
                    <canvas id="pie{{ $key }}" width="400" height="400"></canvas>
                </div>
            @endforeach
        </div>
    <div class="card border-danger border-0">
        <div class="card-header bg-success text-center">LISTE D'ENREGISTREMENT DES INDICATEURS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
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
                               {{--  <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!} --}}
                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id,'projet'=>$projet_id]) }}" class="btn btn-info">Résultats</a>


                            </td>
                            {{-- <td>
                                <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id]) }}" class="btn btn-info">Résultats</a>


                            </td> --}}

                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{--  <div id="calendar" style="height: 800px;"></div>  --}}

            </div>

        </div>


    </div>
</div>

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
@foreach ( $indicateurs as $key=> $indicateur )


const ctxpie{{ $key }} = document.getElementById('pie{{ $key }}').getContext('2d');
const pie{{ $key }} = new Chart(ctxpie{{ $key }}, {
    type: 'pie',
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
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(function() {
        const currentDate = new Date();
        const currentDayOfMonth = currentDate.getDate();
        const currentMonth = currentDate.getMonth(); // Be careful! January is 0, not 1
        const currentYear = currentDate.getFullYear();

        $('#from').val( currentYear + "-" + (currentMonth + 1) + "-" + currentDayOfMonth  );
        $('#to').val(currentYear+ "-" + (currentMonth + 1) + "-" +  currentDayOfMonth  );
      $('input[name="daterange"]').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Appliquer",
            "cancelLabel": "Annuler",
            "fromLabel": "De",
            "toLabel": "A",
            "customRangeLabel": "Custom",
            "weekLabel": "S",
            "daysOfWeek": [
                "Di",
                "Lu",
                "Ma",
                "Me",
                "Je",
                "Ve",
                "Sa"
            ],
            "monthNames": [
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Auout",
                "Septembre",
                "Octobre",
                "Novembre",
                "Decembre"
            ]},
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $('#from').val(start.format('YYYY-MM-DD'));
        $('#to').val(end.format('YYYY-MM-DD'));
      });


    });
    </script>
{{--  <script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>

<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>

<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>

<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
<script>
    var cal = new tui.Calendar('#calendar', {
        defaultView: 'month', // monthly view option
        taskView: true,
        template: {
          monthDayname: function(dayname) {
            return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
          }
        }
      });
      cal.createSchedules([
    {
        id: '1',
        calendarId: '1',
        title: 'my schedule',
        category: 'time',
        dueDateClass: '',
        start: '2021-02-18T17:30:00+09:00',
        end: '2021-02-19T17:31:00+09:00',
    },
    {
        id: '2',
        calendarId: '1',
        title: 'second schedule',
        category: 'time',
        dueDateClass: '',
        start: '2021-02-18T17:30:00+09:00',
        end: '2021-02-19T17:31:00+09:00',
        isReadOnly: true    // schedule is read-only
    }
]);
cal.prev();
</script>  --}}
@endsection
