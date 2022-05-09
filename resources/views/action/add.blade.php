{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister action')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES LIGNES D'ACTION</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('action.index') }}" role="button" class="btn btn-success">LISTE D'ENREGISTREMENT DES LIGNES D'ACTION</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('action.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE LIGNE D'ACTION</div>
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
                                    <label>Nom axe</label>
                                    <select class="form-control  js-example-basic-single"  name="axe_id" required="">
                                        @foreach ($axes as $axe)
                                        <option value="{{$axe->id}}">{{$axe->intitule}}</option>
                                            @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ligne d'action</label>
                                        <textarea name="ligne" class="form-control" required> {{ old('ligne') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>NOUVEAUX RESULTATS ATTENDUS</label>
                                        <textarea name="rts" class="form-control" required> {{ old('rts') }}</textarea>
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


