@extends('layout')
@section('title', '| indicateura')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">GESTION DES INDICATEURS DE PERFORMANCE</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('menuax') }}" role="button" class="btn btn-success">Menu</a></li>
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
        <div class="card-header bg-success text-center">LISTE D'ENREGISTREMENT DES INDICATEURS DE PERFORMANCE</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Axte Stratégique</th>
                            <th>Ligne d'action</th>
                            <th>RESULTATS ATTENDUS</th>
                            <th>INDICATEURS DE PERFORMANCE</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($indicateuras as $indicateura)
                        <tr>
                            <td>{{ $indicateura->id }}</td>
                            <td>{{ $indicateura->action->axe->intitule }}</td>
                            <td>{{ $indicateura->action->ligne }}</td>
                            <td>{{ $indicateura->action->rts }}</td>
                            <td>{{ $indicateura->indicateura }}</td>
                            <td>
                                <a href="{{ route('indicateura.edit', $indicateura->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateura.destroy', $indicateura->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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
