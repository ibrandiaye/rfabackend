{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister resultat')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES resultats</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('resultat.index') }}" role="button" class="btn btn-success">Formulaire d'enregistrement des resultats</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('resultat.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UN resultat</div>
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
                                        <label>indicateur</label>
                                        <select class="form-control" id="indicateur_id" name="indicateur_id" required="">
                                            <option value="">Selectionnez</option>
                                            @foreach ($indicateurs as $indicateur)
                                            <option value="{{$indicateur->id}}">{{$indicateur->indicateur}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="containers">

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valeur atteinte</label>
                                        <input type="number" name="rts" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Observation</label>
                                        <textarea name="observation" class="form-control" > {{ old('observation') }}</textarea>
                                    </div>
                                </div>
                                {{--  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Debut </label>
                                        <input type="date" name="debut" id="debut"  value="{{ old('debut') }}" class="form-control"  required>
                                    </div>
                                </div>  --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date de la dernière mise à jour  </label>
                                        <input type="date" name="fin"  id="fin" value="{{ old('fin') }}" class="form-control"  required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Commune</label>
                                        <select class="form-control" id="commune_id" name="commune_id" required="">
                                            <option value="">Selectionnez</option>
                                            @foreach ($communes as $commune)
                                            <option value="{{$commune->id}}">{{$commune->nomc}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Village/quartier</label>
                                        <select class="form-control" id="village_id" name="village_id" >
                                            <option value="">Selectionnez</option>
                                        </select>
                                    </div>
                                </div>
                                {{--  @if($projet->typecadre=="Cadre de  resultat")  --}}
                                <div class="col-lg-6">
                                    <label>Année</label>
                                    <select class="form-control" name="annee" required="">
                                        <option value="">Selectionnez</option>
                                        @for ($i=1; $i <= $projet->duree; $i++)
                                        <option value="{{$i}}">annee {{$i}}</option>
                                        @endfor

                                    </select>
                                </div>
                                {{--  @endif  --}}
                                <input type="hidden" name="projet_id" value="{{ $projet->id }}">
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
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script type='text/javascript'>
    var duree=0;
    $("#indicateur_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var idv =  $("#indicateur_id").children("option:selected").val();
        //alert("You have selected the country - " + idv);
        $(".containers").empty();
        $.ajax({
            type:'GET',
            url:'/suivievaluation/public/desagrege/by/indicateur/'+idv,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {

                $.each(data,function(index,row){
                    $(".containers").append("<div class='col-lg-6'> <div class='form-group  test'><label class='fieldlabels'>Valeur pour "+row.titre+":</label>"+
                    "<input type='number' name='valeur[]'  value='{{ old('valeur') }}' class='form-control' step='0.01' required >"+
                    "<input type='hidden' name='desagrege_id[]'  value="+row.id+" class='form-control'  required >");
                });

            }
        });
        $.ajax({
            type:'GET',
            url:'/suivievaluation/public/indicateur/'+idv,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                if(data.frequence=='Hebdomadaire')
                    duree =7;
                else if(data.frequence=='Mensuelle')
                    duree =30;
                else if(data.frequence=='Trimestrielle')
                    duree =90;
                else if(data.frequence=='Semestrielle')
                    duree =180;
                else if(data.frequence=='Annuelle')
                    duree==365;


            }
        });

    });

    $(document).ready(function () {

        $("#debut").on('change',function(){
            console.log(duree);
           var date = $("#debut").val();
           var new_date = moment(date).add(duree, 'days');
           $("#fin").val(new_date.format('YYYY-MM-DD'));
           console.log(new_date);
          });
    });
    $("#commune_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var commune_id =  $("#commune_id").children("option:selected").val();
        // alert("You have selected the country - " + commune_id);
        var village_id = "<option value=''>Veuillez selectionner</option>";
        $.ajax({
            type:'GET',
           // url:'http://46.105.120.83/suivievaluation/public/villages/commune/'+commune_id,
            url:'http://127.0.0.1:8000/villages/commune/'+commune_id,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {

                //var village_id = " <option value=''>Sélectionner</option>";
                $.each(data,function(index,row){
                    //alert(row.nomd);
                    village_id +="<option value="+row.id+">"+row.nomv+"</option>";

                });
                $("#village_id").empty();
                $("#village_id").append(village_id);
            }
        });

    });
</script>

@endsection








