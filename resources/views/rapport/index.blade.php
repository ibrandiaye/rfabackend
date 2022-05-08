@extends('layout')
@section('calendar')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    fieldset {
      background-color: #eeeeee;
      display: block;
      margin-left: 2px;
      margin-right: 2px;
      padding-top: 0.35em;
      padding-bottom: 0.625em;
      padding-left: 0.75em;
      padding-right: 0.75em;
      border: 2px groove (internal value);
    }

    legend {
      background-color: gray;
      color: white;
      padding: 5px 10px;
    }
    </style>
@endsection


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Liste des Rapports de {{ $projet->nom }}</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$projet->id]) }}" role="button" class="btn btn-success">Menu</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('rapport.create',['projet_id'=>$projet->id]) }}" role="button" class="btn btn-success">Ajouter un Rapport</a></li>
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
        <div class="card-header bg-success text-center">Nom Projet : {{ $projet->nom }}</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Type</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Projet</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rapports as $rapport)
                        <tr>
                            <td>@if($rapport->document)<a href="{{  asset('document/'.$rapport->document)  }}">Rapport</a>@endif</td>
                            <td>{{ $rapport->periode }}</td>
                            <td>{{ $rapport->ddebut }}</td>
                            <td>{{ $rapport->dfin }}</td>
                            <td>{{ $rapport->projet->nom }}</td>
                            <td>
                                <a href="{{ route('rapport.edit', $rapport->id) }}" role="button" class="btn btn-info"><i class="fas fa-edit"></i></a>
                               {{--   <a href="{{ route('rapport.show', $rapport->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['rapport.destroy', $rapport->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}  --}}



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
