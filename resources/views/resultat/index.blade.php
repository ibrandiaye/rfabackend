@extends('layout')
@section('title', '| resultat')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES resultatS</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('resultat.create') }}" role="button" class="btn btn-primary">ENREGISTRER resultat</a></li>
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
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES resultatS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Projet</th>
                            <th>Nom indicateur</th>
                            <th>valeur Total</th>
                            <th>Desagrege</th>
                            <th>Date début </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($resultats as $resultat)
                        <tr>
                            <td>{{ $resultat->id }}</td>
                            <td>{{ $resultat->objectif }}</td>
                            <td>{{ $resultat->resultat }}</td>
                            <td>{{ $resultat->donneeref }}</td>
                            <td>{{ $resultat->cible }}</td>
                            <td>{{ $resultat->methode }}</td>
                            <td>{{ $resultat->frequence }}</td>
                            <td>{{ $resultat->responsable }}</td>
                            <td>{{ $resultat->projet->nom }}</td>
                            <td>
                                <a href="{{ route('resultat.edit', $resultat->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['resultat.destroy', $resultat->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}



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
