@extends('layout')

@section('title', '| Modifier Activité')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Modifier Activité</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$rapport->projet_id]) }}" role="button" class="btn btn-success">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('rapport.index') }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($rapport, ['method'=>'PATCH','route'=>['rapport.update', $rapport->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION RAPPORT</div>
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Rapport</label>
                                    <input type="file" name="doc"  class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date Debut</label>
                                    <input type="date" name="debut" id="from"  value="{{ $rapport->ddebut}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date Fin</label>
                                    <input type="date" name="fin"  id="to" value="{{ $rapport->dfin }}" class="form-control" required>
                                </div>
                            </div>


                            <input type="hidden" name="projet_id" value="{{ $rapport->projet_id }}" required>
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
