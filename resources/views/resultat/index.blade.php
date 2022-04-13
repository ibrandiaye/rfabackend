@extends('layout')
@section('title', '| resultat')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES RESULTATS</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu', ['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">menu</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('fiche.indicateur.projet', ['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Fiche de suivi des indicateurs</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ route('resultat.create') }}" role="button" class="btn btn-success">ENREGISTRER resultat</a></li>
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
        <div class="card-header bg-success text-center">LISTE D'ENREGISTREMENT DES RESULTATS</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>Projet</th>
                            <th>Nom indicateur</th>
                            <th>valeur Total</th>
                            <th>Desagrege</th>
                            <th>Observation</th>
                            <th>Date début </th>
                            <th>Date Fin </th>
                            <th>Commune</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($resultats as $resultat)
                        <tr>
                            <td>{{ $resultat->indicateur->projet->nom }}</td>
                            <td>{{ $resultat->indicateur->indicateur }}</td>
                            <td>{{ $resultat->rts }}</td>
                            <td>@foreach ($resultat->resultatDetails as $resultatDetail )
                                {{ $resultatDetail->valeur }} {{ $resultatDetail->desagrege->titre }},
                            @endforeach</td>
                            <td>{{ $resultat->observation }}</td>
                            <td>{{ $resultat->debut }}</td>
                            <td>{{ $resultat->fin }}</td>
                            <td>{{ $resultat->commune->nomc }}</td>
                            <td>
                                <a href="{{ route('resultat.edit', $resultat->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
