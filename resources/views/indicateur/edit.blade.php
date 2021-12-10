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
                        <h1 class="m-0 text-info">GESTION DES Indicateurs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('projet.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($projet, ['method'=>'PATCH','route'=>['projet.update', $projet->id]]) !!}
        @csrf
        <div class="card border-danger border-0">
                   <div class="card-header bg-info text-center">FORMULAIRE  De modification indicateur</div>
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
                                   <label>Objectif</label>
                                   <textarea name="objectif" class="form-control" required> {{ old('objectif') }}</textarea>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Nom du indicateur</label>
                                   <input type="text" name="indicateur"  value="{{ old('indicateur') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Données de référence </label>
                                   <input type="text" name="donneeref"  value="{{ old('donneeref') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Cibles en fin de projet  </label>
                                   <input type="number" name="cible"  value="{{ old('cible') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Unité de Mesure</label>
                                   <input type="text" name="unite"  value="{{ old('unite') }}" class="form-control"  >
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Méthode de collecte des données</label>
                                   <input type="text" name="methode"  value="{{ old('methode') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="conteneur">
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label>Valeur en Chiffre</label>
                                       <input type="number" name="quantite[]"  value="{{ old('quantite') }}" class="form-control"  required>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-group">
                                       <label>Unité de mesure</label>
                                       <input type="text" name="titre[]"  value="{{ old('titre') }}" class="form-control"  required>
                                   </div>
                               </div>
                               <button type="button"  class="btn btn-success addRow">AJOUTER</button></h2>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Fréquence de collecte des données</label>
                                   <input type="text" name="frequence"  value="{{ old('frequence') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Respondsable de la collecte des données</label>
                                   <input type="text" name="responsable"  value="{{ old('responsable') }}" class="form-control"  required>
                               </div>
                           </div>
                           <div class="col-lg-6">
                               <div class="form-group">
                                   <label>Projet</label>
                                   <select class="form-control" name="projet_id" required="">
                                       @foreach ($projets as $projet)
                                       <option value="{{$projet->id}}">{{$projet->nom}}</option>
                                           @endforeach

                                   </select>
                               </div>
                           </div>
                           <div>
                               <center>
                                   <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                               </center>
                           </div>
                       </div>

                       </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
