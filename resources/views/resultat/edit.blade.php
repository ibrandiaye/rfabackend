{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Modifier Région')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES PROJETS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('go.menu', ['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">menu</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('fiche.indicateur.projet', ['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Fiche de suivi des indicateurs</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($resultat, ['method'=>'PATCH','route'=>['resultat.update', $resultat->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION RESULTAT</div>
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
                                            <option value="{{$indicateur->id}}" {{ $indicateur->id == $resultat->indicateur_id ? 'selected' : ''}} >{{$indicateur->indicateur}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valeur atteinte</label>
                                        <input type="number" name="rts" value="{{ $resultat->rts }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="containers">
                                    @foreach ($resultatDetails as $resultatDetail )
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Valeur pour {{ $resultatDetail->titre }}</label>
                                            <input type="number" name='valeur[]'  value='{{ $resultatDetail->valeur }}' class='form-control'  required>
                                            <input type='hidden' name='desagrege_id[]'  value="{{ $resultatDetail->desagrege_id }}" class='form-control'  required >
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Observation</label>
                                        <textarea name="observation" class="form-control" required> {{ $resultat->observation }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Debut </label>
                                        <input type="date" name="debut"  value="{{ $resultat->debut }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Fin </label>
                                        <input type="date" name="fin"  value="{{ $resultat->fin }}" class="form-control"  required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Commune</label>
                                        <select class="form-control" id="commune_id" name="commune_id" required="">
                                            <option value="">Selectionnez</option>
                                            @foreach ($communes as $commune)
                                            <option value="{{$commune->id}}" {{ $commune->id == $resultat->commune_id ? 'selected' : ''}}>{{$commune->nomc}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>
                                @if($projet->typecadre=="Cadre de  resultat")
                                <div class="col-lg-6">
                                    <label>Année</label>
                                    <select class="form-control" name="annee" required="">
                                        <option value="">Selectionnez</option>
                                        @for ($i=1; $i <= $projet->duree; $i++)
                                        <option value="{{$i}}" {{ $resultat->annee == 'annee '.$i ? 'selected' : ''}}>annee {{$i}}</option>
                                        @endfor

                                    </select>
                                </div>
                                @endif
                                <input type="hidden" value="{{ $projet_id }}" name="projet_id">
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
@section('script')
<script type=text/javascript>
    $("#indicateur_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var idv =  $("#indicateur_id").children("option:selected").val();
        //alert("You have selected the country - " + idv);
        var numero_id = "";
        $.ajax({
            type:'GET',
            //url:'/suivievaluation/public/desagrege/by/indicateur/'+idv,
            url:'http://127.0.0.1:8000/desagrege/by/indicateur/'+idv,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {

                numero_id += " <option value=''>Sélectionner</option>";
                $.each(data,function(index,row){
                    $(".containers").append("<div class='col-lg-6'> <div class='form-group  test'><label class='fieldlabels'>Valeur pour "+row.titre+":</label>"+
                    "<input type='number' name='valeur[]'  value='{{ old('valeur') }}' class='form-control'  required >"+
                    "<input type='hidden' name='desagrege_id[]'  value="+row.id+" class='form-control'  required >");
                });
                $("#numero_id").empty();
                $("#numero_id").append(numero_id);
            }
        });

    });
</script>

@endsection

