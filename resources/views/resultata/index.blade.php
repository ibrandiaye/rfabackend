@extends('layout')
@section('title', '| resultata')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES REALISATIONS DU PLAN STRATEGIQUE</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('resultata.create') }}" role="button" class="btn btn-success">ENREGISTRER UN REALISATION DU PLAN STRATEGIQUE</a></li>
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
        <div class="card-header bg-success text-center">LISTE D'ENREGISTREMENT DES REALISATIONS DU PLAN STRATEGIQUE</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Axe Stratégique</th>
                            <th>Ligne d'action</th>
                            <th>RESULTATS ATTENDUS</th>
                            <th>INDICATEURS DE PERFORMANCE</th>
                            <th>Realisation</th>
                            <th>Budget</th>
                            <th>Source de Financement</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($resultatas as $resultata)
                        <tr>
                            <td>{{ $resultata->id }}</td>
                            <td>{{ $resultata->indicateura->action->axe->intitule }}</td>
                            <td>{{ $resultata->indicateura->action->ligne }}</td>
                            <td>{{ $resultata->indicateura->action->rts }}</td>
                            <td>{{ $resultata->indicateura->indicateura }}</td>
                            <td>{{ $resultata->rtsa }}</td>
                            <td>{{ $resultata->budjet }} CFA</td>
                            <td>{{ $resultata->sf }}</td>
                            <td>
                                <a href="{{ route('resultata.edit', $resultata->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['resultata.destroy', $resultata->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
