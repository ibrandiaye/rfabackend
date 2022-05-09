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
                        <h1 class="m-0 text-info">GESTION DES REALISATIONS DU PLAN STRATEGIQUE</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('resultata.index') }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($resultata, ['method'=>'PATCH','route'=>['resultata.update', $resultata->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION D'UNE REALISATION DU PLAN STRATEGIQUE</div>
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
                                    <label>indicateura Stratégique</label>
                                    <select class="form-control" name="indicateura_id" required="">
                                        @foreach ($indicateuras as $indicateura)
                                        <option {{old('indicateura_id', $resultata->indicateura_id) == $indicateura->id ? 'selected' : ''}}
                                            value="{{$indicateura->id}}">{{$indicateura->indicateura}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valeur atteinte</label>
                                        <input type="number" name="rtsa" value="{{ $resultata->rtsa }}" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Budget</label>
                                        <input type="number" name="budjet" value="{{ $resultata->budjet }}" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Source de Financement</label>
                                        <input type="text" name="sf"  value="{{ $resultata->sf }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
