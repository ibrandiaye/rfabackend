@extends('layout')

@section('title', '| Modifier Activité')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Modifier Activité {{ $projet->nom  }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('suiviactivite.projet',$projet_id) }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($suiviActivite, ['method'=>'PATCH','route'=>['suiviActivite.update', $suiviActivite->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION D'une activite {{ $projet->nom }}</div>
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
                                    <label>Activite</label>
                                    <select class="form-control" name="activite_id" required>
                                        <option value="">Faites un choix</option>
                                        @foreach($activites as $activite)
                                        <option value="{{ $activite->id }}" {{old('activite_id', $suiviActivite->activite_id) == $activite->id ? 'selected' : ''}}>{{ $activite->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Niveau  de réalisation</label>
                                    <select class="form-control" name="niveaur" required>
                                        <option value="">Faites un choix</option>
                                        <option value="realise" {{old('niveaur', $suiviActivite->niveaur) == 'realise' ? 'selected' : ''}} >realise</option>
                                        <option value="non realise" {{old('niveaur', $suiviActivite->niveaur) == 'non realise' ? 'selected' : ''}}>non realise</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="projet_id" value="{{ $projet_id }}">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date de Réalsation</label>
                                    <input type="date" name="dater" id="from"  value="{{ $suiviActivite->dater }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Résultats obtenus (Livrables)</label>
                                <textarea class="textarea" name="resultat" placeholder="Place some text here"
                                          style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $suiviActivite->resultat }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Observation</label>
                                <textarea class="textarea" name="observation" placeholder="Place some text here"
                                          style="width: 100%; height: 340px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $suiviActivite->observation }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Lieu</label>
                                    <select class="form-control" id="commune_id" name="commune_id" required="">
                                        <option value="">Selectionnez</option>
                                        @foreach ($communes as $commune)
                                        <option value="{{$commune->id}}" {{ $commune->id == $suiviActivite->commune_id ? 'selected' : ''}}>{{$commune->nomc}}</option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="projet_id" value="{{ $activite->projet_id }}" required>
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
