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
                        <h1 class="m-0 text-info">Formulaire d'enregistrement d'un </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('rapport.index',['projet_id'=>$projet->id]) }}" role="button" class="btn btn-success">LISTE D'ENREGISTREMENT DES Activités</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('rapport.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE rapport</div>
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
                                <input type="hidden" name="projet_id" value="{{ $projet_id }}">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Rapport</label>
                                        <input type="file" name="doc"  class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fréquence</label>
                                        <select class="form-control" name="periode" required="">
                                            <option value="">Veuillez Selectionnez</option>
                                            <option value="Hebdomadaire">Hebdomadaire</option>
                                            <option value="Mensuelle">Mensuelle</option>
                                            <option value="Trimestrielle">Trimestrielle</option>
                                            <option value="Semestrielle">Semestrielle</option>
                                            <option value="Annuelle">Annuelle</option>
                                        </select>
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
                                <input type="hidden" name="ddebut" id="from"  value="{{ old('debut') }}" class="form-control" required>
                                <input type="hidden" name="dfin"  id="to" value="{{ old('fin') }}" class="form-control" required>

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

