{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister projet')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES Projets</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('projet.index') }}" role="button" class="btn btn-success">Formulaire d'enregistrement des projets</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('projet.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UN PROJET</div>
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
                                        <label>Nom du Projet</label>
                                        <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Durée</label>
                                        <input type="number" name="duree"  value="{{ old('duree') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Objectif</label>
                                        <textarea name="objectif"    class="form-control" > {{ old('objectif') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Type Cadre</label>
                                        <select class="form-control" name="typecadre" required="">
                                            <option value="">Veuillez Selectionnez</option>
                                            <option value="Cadre logique">Cadre Logique</option>
                                            <option value="Cadre de  resultat">Cadre de  resultat</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Pays</label>
                                        <select class="form-control" id="pays_id" name="pays_id" required="">
                                            <option value="">Veuillez Selectionnez</option>
                                            @foreach($payss as $key => $pays)
                                                <option value="{{ $pays->id }}">{{ $pays->nomp }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group" id="region_id">
                                        {{--  @foreach ($regions as $region )  --}}


                                        </div>
                                        {{--  @endforeach  --}}
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
<script type='text/javascript'>
$("#pays_id").change(function () {

    //var selectedClasse = $(this).children("option:selected").val();
var pays_id =  $("#pays_id").children("option:selected").val();
    // alert("You have selected the country - " + region_id);
    //var region_id = "<option value=''>Veuillez selectionner</option>";
    var region_id ='';
    $.ajax({
        type:'GET',
        url:"http://46.105.120.83/suivievaluation/public/pays/region/"+pays_id,
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {

            //var region_id = " <option value=''>Sélectionner</option>";
            $.each(data,function(index,row){
                //alert(row.nomd);
                region_id +=" <div class='custom-control custom-checkbox' >"+
                "<input class='custom-control-input' name='zone[]' type='checkbox' id="+row.id+" value="+row.id+">"+
                "<label for='"+row.id+"' class='custom-control-label'>"+row.nom+"</label> </div>";



            });
            $("#region_id").empty();
            $("#region_id").append(region_id);
        }
    });

});
</script>
@endsection
