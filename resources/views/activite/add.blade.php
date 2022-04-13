{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister Activité')

@section('content')
    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Canevas de planification</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('activite.index') }}" role="button" class="btn btn-success">LISTE D'ENREGISTREMENT DES Activités</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('activite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE ACTIVITE</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom Activite</label>
                                        <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Periode</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                          </span>
                                        </div>
                                        <input type="text" name="daterange" class="form-control float-right" id="reservation">
                                     </div>
                                </div>
                                {{--  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Debut</label>
                                        <input type="text" name="debut" id="from"  value="{{ old('debut') }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Fin</label>
                                        <input type="text" name="fin"  id="to" value="{{ old('fin') }}" class="form-control" required>
                                    </div>
                                </div>  --}}
                                <input type="hidden" name="debut" id="from"  value="{{ old('debut') }}" class="form-control" required>
                                <input type="hidden" name="fin"  id="to" value="{{ old('fin') }}" class="form-control" required>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Résultats attendus</label>
                                    <textarea class="textarea" name="rts" placeholder="Place some text here"
                                              style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                        <input type="text" name="responsable"  value="{{ old('responsable') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email Responsable</label>
                                        <input type="email" name="email"  value="{{ old('email') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Indicateur</label>
                                    @foreach ( $indicateurs as $indicateur)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="radio1" name="indicateur[]" value="{{ $indicateur->id }}" >
                                        <label class="form-check-label" for="radio1">{{ $indicateur->indicateur }}</label>
                                      </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Fiche de collecte</label>
                                        <input type="file" name="fiche"  class="form-control" >
                                    </div>
                                </div>
                               {{--   <div class="col-lg-6">
                                    <label>Etat</label>
                                    <select class="form-control" name="etat" required="">
                                        <option value="">Veuillez sélectionner</option>
                                        <option value="non realise">non realise</option>
                                        <option value="realise">realise</option>

                                    </select>
                                </div>  --}}
                                {!! Form::hidden('etat', 'non realise') !!}
                                <input type="hidden" name="projet_id" value="{{ $projet_id }}" required>
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>
                            </div>

                            </div>

            </form>
            </div>
        </div>



@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(function() {
        const currentDate = new Date();
        const currentDayOfMonth = currentDate.getDate();
        const currentMonth = currentDate.getMonth(); // Be careful! January is 0, not 1
        const currentYear = currentDate.getFullYear();

        $("#from").val( currentYear + "-" + (currentMonth + 1) + "-" + currentDayOfMonth  );
        $("#to").val(currentYear+ "-" + (currentMonth + 1) + "-" +  currentDayOfMonth  );
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
        $("#from").val(start.format('YYYY-MM-DD'));
        $("#to").val(end.format('YYYY-MM-DD'));
      });


    });
    </script>

    <script src=" {{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection

