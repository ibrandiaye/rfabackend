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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('resultat.index') }}" role="button" class="btn btn-primary">Formulaire d'enregistrement des resultats</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('resultat.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UN resultat</div>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valeur Total</label>
                                        <textarea name="rts" class="form-control" required> {{ old('rts') }}</textarea>
                                    </div>
                                </div>
                                <div class="containers">

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Debut </label>
                                        <input type="date" name="debut"  value="{{ old('debut') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date Fin </label>
                                        <input type="date" name="fin"  value="{{ old('fin') }}" class="form-control"  required>
                                    </div>
                                </div>



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
<script type=text/javascript>
    $("#indicateur_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var idv =  $("#indicateur_id").children("option:selected").val();
        //alert("You have selected the country - " + idv);
        var numero_id = "";
        $.ajax({
            type:'GET',
            url:'/desagrege/by/indicateur/'+idv,
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



