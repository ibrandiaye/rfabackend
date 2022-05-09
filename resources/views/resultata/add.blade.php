{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister resultata')

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
                        <li class="breadcrumb-item active"><a href="{{ route('resultata.index') }}" role="button" class="btn btn-success">FORMULAIRE D'ENREGISTREMENT DES REALISATIONS DU PLAN STRATEGIQUE</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('resultata.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE REALISATION DU PLAN STRATEGIQUE</div>
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
                                    <label>Indicateur de Performance</label>
                                    <select class="form-control  js-example-basic-single"  name="indicateura_id" required="">
                                        @foreach ($indicateuras as $indicateura)
                                        <option value="{{$indicateura->id}}">{{$indicateura->indicateura}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Valeur atteinte</label>
                                        <input type="number" name="rtsa" value="{{ old('rtsa') }}" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Budget</label>
                                        <input type="number" name="budjet" value="{{ old('budjet') }}" class="form-control" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Source de Financement</label>
                                        <input type="text" name="sf"  value="{{ old('sf') }}" class="form-control"  required>
                                    </div>
                                </div>

                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>
                            </div>

                            </div>

            </form>
            </div>
        </div>



@endsection


