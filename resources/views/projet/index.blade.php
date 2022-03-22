@extends('layout')
@section('title', '| projet')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES PROJETS</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('projet.create') }}" role="button" class="btn btn-success">ENREGISTRER projet</a></li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="col-12">
    <div class="card border-danger border-0">
        <div class="card-header bg-success text-center">LISTE D'ENREGISTREMENT DES PROJETS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom Projet</th>
                            <th>Objectif</th>
                            <th>Durée</th>
                            <th>Type Cadre</th>
                            <th>Zones d'intervation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($projets as $projet)
                        <tr>
                            <td>{{ $projet->id }}</td>
                            <td>{{ $projet->nom }}</td>
                            <td>{{ $projet->objectif }}</td>
                            <td>{{ $projet->typecadre }}</td>
                            <td>{{ $projet->duree }} ans</td>
                            <td>
                                @foreach ($projet->zones as $zone)
                                    {{ $zone->region->nom }},
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('projet.edit', $projet->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['projet.destroy', $projet->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}

                                <a href="{{ route('projet.indicateur', ['projet_id'=>$projet->id]) }}" class="btn btn-info">Indicateur</a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

        </div>
    </div>
</div>

@endsection
