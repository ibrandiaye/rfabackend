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
                                        @foreach ($regions as $region )
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input" name="zone[]" type="checkbox" id="customCheckbox{{ $region->id }}" value="{{ $region->id }}">
                                          <label for="customCheckbox{{ $region->id }}" class="custom-control-label">{{ $region->nom }}</label>
                                        </div>
                                        @endforeach
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


