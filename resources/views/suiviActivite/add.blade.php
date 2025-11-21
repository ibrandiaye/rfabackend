
{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Suivi Activités')

@section('content')
    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Projet : {{ $projet->nom }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('suiviactivite.projet',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">LISTE D'ENREGISTREMENT DES Activités</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('suiviActivite.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT Suivi Activite</div>
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
                                <div class="col-lg-6" id="prev">
                                    <div class="form-group">
                                        <label>Activite</label>
                                        <select class="form-control" id="activite_id" name="activite_id" >
                                            <option value="">Faites un choix</option>
                                            @foreach($activites as $activite)
                                            <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="projet" value="{{ $projet_id }}">
                                <input type="hidden" name="projet_id" value="{{ $projet_id }}">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date de Réalsation</label>
                                        <input type="date" name="dater" id="from"  value="{{ old('dater') }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Niveau  de réalisation</label>
                                        <select class="form-control" id="etat" name="etat" required>
                                            <option value="">Faites un choix</option>
                                            <option value="prevue">prévue réalisée</option>
                                            <option value="non prevu">non prévue réalisée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="" id="contenu">

                                </div>
                                <input type="hidden" value="realise" name="niveaur">

                                {{--  <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Niveau  de réalisation</label>
                                        <select class="form-control" name="niveaur" required>
                                            <option value="">Faites un choix</option>
                                            <option value="realise">realise</option>
                                            <option value="non realise">non realise</option>
                                        </select>
                                    </div>
                                </div>  --}}
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <label>Résultats obtenus (Livrables)</label>
                                    <textarea class="textarea" name="resultat" placeholder="Place some text here"
                                              style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <label>Observation</label>
                                    <textarea class="textarea" name="observation" placeholder="Place some text here"
                                              style="width: 100%; height: 340px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Rapport</label>
                                        <input type="file" name="rp"  class="form-control" >
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Lien du video</label>
                                        <input type="url" name="video"  class="form-control" placeholder="ex: https://www.youtube.com/watch?v=NwwiBVk1X1o">
                                    </div>
                                </div>
                                <div class="conteneur">

                                    <button type="button"  class="btn btn-success addRow">Ajouter Image</button></h2>
                                </div>
                                <div class="containers"></div>
                                @if($projet->typecadre=='Cadre de  resultat')
                                <div class='col-lg-6'><label>Année</label>
                                    <select class='form-control' name='annee' required=''>
                                        <option value=''>Selectionnez</option>
                                            @for ($i=1; $i <= $projet->duree; $i++)
                                                <option value='{{$i}}'>annee {{$i}}</option>
                                            @endfor
                                    </select>
                                </div>
                                @endif
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
<script src=" {{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script type='text/javascript'>
    $("#activite_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var idv =  $("#activite_id").children("option:selected").val();
        //alert("You have selected the country - " + idv);
        $(".containers").empty();
        $.ajax({
            type:'GET',
            //url:'/suivievaluation/public/activite/indicateur/'+idv,
            url:'http://127.0.0.1:8000/activite/indicateur/'+idv,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                console.log(data);
                $.each(data,function(index,row){
                    $(".containers").append("<h4>"+row.indicateur.indicateur+"</h4>"+
                        "<input type='hidden' name='indicateurs[]' value="+row.indicateur.id+"><div class='col-lg-6'>"+
                        "<div class='form-group'>"+
                            " <label>Valeur atteinte</label> "+
                            " <input type='number' name='rts[]' class='form-control' required> "+
                            " </div> "+
                            " </div> "+
                            "<div class='col-lg-6'> "+
                                "<div class='form-group'> "+
                                    " <label>Observation</label> "+
                                    " <textarea name='observation[]' class='form-control' required> </textarea> "+
                                    "</div> "+
                                    "</div>"

                    );

                    $.each(row.indicateur.desegrages,function(index1,row1){
                        $(".containers").append( "<div class='col-lg-6'> <div class='form-group  test'><label class='fieldlabels'>Valeur pour "+row1.titre+":</label>"+
                        "<input type='number' name='valeur[]'  value='' class='form-control'  required >"+
                        "<input type='hidden' name='desagrege_id[]'  value="+row1.id+" class='form-control'  required ></div></div>"+
                         "<input type='hidden' name='indid[]' value="+row.indicateur_id+">"
                        );

                         });
                });

            }
        });


    });
    $("#etat").change(function () {
        valeurs = $('#etat').val();
      //  alert(valeurs);*
      if(valeurs=='non prevu'){
          $('#contenu').append(" <div class='col-lg-6' id='nprev'>"+
            "<div class='form-group'>"+
                "<label>Titre Activite</label>"+
                "<input type='text' name='activite'   class='form-control'  >"+
                "</div>"+
                "</div>");
                $("#prev").hide();
      }else{
        $("#prev").show();
        $("#contenu").empty();
      }

    });
    $("#commune_id").change(function () {

        //var selectedClasse = $(this).children("option:selected").val();
    var commune_id =  $("#commune_id").children("option:selected").val();
        // alert("You have selected the country - " + commune_id);
        var village_id = "<option value=''>Veuillez selectionner</option>";
        $.ajax({
            type:'GET',
            url:'http://46.105.120.83/suivievaluation/public/villages/commune/'+commune_id,
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


        $(document).ready(function(){
            $(".addRow").click(function() {
                $(".conteneur").append("<div class='col-lg-6'> <div class='form-group  test'><label class='fieldlabels'>Image :</label>"+
                    "<input type='file' name='images[]'  value='{{ old('quantite') }}' class='form-control'  required >"+
                    "<button type='button' class='btn btn-danger remove-tr'>Supprimer</button></div></div>");
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).parent('div .test').remove();
            });
       });



</script>
@endsection
