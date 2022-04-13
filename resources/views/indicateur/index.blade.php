@extends('layout')
@section('title', '| indicateur')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Cadre Logique/Cadre mesure</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('indicateur.create') }}" role="button" class="btn btn-success">ENREGISTRER INDICATEUR</a></li>
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
        <div class="card-header bg-success text-center">Cadre Logique/Cadre mesure</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>

                            <th>Objectif</th>
                            <th>indicateur</th>
                            <th>Valeur de référence</th>
                            <th>Cibles en fin de projet</th>
                            <th>Cibles année 1</th>
                            <th>Cibles année 2</th>
                            <th>Cibles année 3</th>
                            <th>Cibles année 4</th>
                            <th>Cibles année 5</th>
                            <th>Méthode de collecte des données</th>
                            <th>Fréquence de collecte des données</th>
                            <th>Respondsable de la collecte des données</th>
                            <th>Projet</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($indicateurs as $indicateur)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::limit($indicateur->objectif , 50, $end='...') }}</td>
                            <td>{{ $indicateur->indicateur }}</td>
                            <td>{{ $indicateur->donneeref }}</td>
                            <td>{{ $indicateur->cible }} {{ $indicateur->unite }}</td>
                            <th>
                            @foreach ($indicateur->cibles as $cible )
                                @if($cible->periode==1 )
                                    {{ $cible->valeur }}
                                @endif
                            @endforeach
                            </th>
                            <th>
                                @foreach ($indicateur->cibles as $cible )
                                    @if($cible->periode==2 )
                                        {{ $cible->valeur }}
                                    @endif
                                @endforeach
                                </th>
                                <th>
                                    @foreach ($indicateur->cibles as $cible )
                                        @if($cible->periode==3 )
                                            {{ $cible->valeur }}
                                        @endif
                                    @endforeach
                                    </th>
                                    <th>
                                        @foreach ($indicateur->cibles as $cible )
                                            @if($cible->periode==4 )
                                                {{ $cible->valeur }}
                                            @endif
                                        @endforeach
                                        </th>
                                        <th>
                                            @foreach ($indicateur->cibles as $cible )
                                                @if($cible->periode==5 )
                                                    {{ $cible->valeur }}
                                                @endif
                                            @endforeach
                                            </th>
                            <td>{{ $indicateur->methode }}</td>
                            <td>{{ $indicateur->frequence }}</td>
                            <td>{{ $indicateur->responsable }}</td>
                            <td>{{ $indicateur->projet->nom }}</td>
                            <td>
                                <a href="{{ route('indicateur.edit', $indicateur->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                               @if(count($indicateur->resultats)<=0)
                                {!! Form::open(['method' => 'DELETE', 'route'=>['indicateur.destroy', $indicateur->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                                @endif
                                <a href="{{ route('indicateur.resultat', ['indicateur'=>$indicateur->id,'projet'=>$projet_id]) }}" class="btn btn-info">Résultats</a>


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
