{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Enregister Département')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES COMMUNES</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('commune.index') }}" role="button" class="btn btn-success">LISTE D'ENREGISTREMENT DES communes</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('commune.store') }}" method="POST">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE D'ENREGISTREMENT D'UNE COMMUNE</div>
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
                                    <div class="form-group">
                                        <label>Nom Commune</label>
                                        <input type="text" name="nomc"  value="{{ old('nomc') }}" class="form-control" min="1" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="number" name="latitudec"  value="{{ old('latitudec') }}" step="any" class="form-control" required>
                                    </div>
                                </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="number" name="longitudec"  value="{{ old('longitudec') }}" step="any" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nom Région</label>
                                        <select class="form-control" name="departement_id" required="">
                                            @foreach ($departements as $departement)
                                            <option value="{{$departement->id}}">{{$departement->nomd}}</option>
                                                @endforeach

                                        </select>
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


