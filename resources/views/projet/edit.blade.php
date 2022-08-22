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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('projet.index') }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($projet, ['method'=>'PATCH','route'=>['projet.update', $projet->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION TABLE</div>
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
                                        <label>Nom de la projet</label>
                                    <input type="text" name="nom" class="form-control" value="{{$projet->nom}}"   required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Durée</label>
                                        <input type="number" name="duree"  value="{{ $projet->duree }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Objectif</label>
                                        <textarea name="objectif"  class="form-control" > {{ $projet->objectif }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Type Cadre</label>
                                        <select class="form-control" name="typecadre" required="">
                                            <option value="">Veuillez Selectionnez</option>
                                            <option value="Cadre logique" {{old('typecadre', $projet->typecadre) == 'Cadre logique' ? 'selected' : ''}}>Cadre Logique</option>
                                            <option value="Cadre de  resultat"  {{old('typecadre', $projet->typecadre) == 'Cadre de  resultat' ? 'selected' : ''}}>Cadre de  resultat</option>
                                            <option value="Plan d'action" {{old('typecadre', $projet->typecadre) == 'Plan d\'action' ? 'selected' : ''}}>Plan d'action</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        @foreach ($regions as $key=> $region )

                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input" name="zone[]" type="checkbox" id="customCheckbox{{ $region->id }}" value="{{ $region->id }}"  {{$tab[$key] == true ? 'checked' : ''}}>
                                          <label for="customCheckbox{{ $region->id }}" class="custom-control-label">{{ $region->nom }}</label>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Image en avant</label>
                                        <input type="file" name="image"  class="form-control" >
                                    </div>
                                </div>
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
