{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister indicateura')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES INDICATEURS DE PERFORMANCE</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('indicateura.index') }}" role="button" class="btn btn-success">FORMULAIRE D'ENREGISTREMENT DES INDICATEURS DE PERFORMANCE</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('indicateura.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UN  INDICATEUR DE PERFORMANCE</div>
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
                                    <label>Ligne action</label>
                                    <select class="form-control  js-example-basic-single"  name="action_id" required="">
                                        @foreach ($actions as $action)
                                        <option value="{{$action->id}}">{{$action->ligne}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Indicateur de Performance</label>
                                        <textarea name="indicateura" class="form-control" required> {{ old('indicateura') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Unité</label>
                                        <input type="text" name="unite"  value="{{ old('unite') }}" class="form-control"  required>
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


