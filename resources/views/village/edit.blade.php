{{-- \resources\views\permissions\create.blade.php --}}
@extends('layout')

@section('title', '| Modifier village')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">GESTION DES VILLAGES</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('village.index') }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($village, ['method'=>'PATCH','route'=>['village.update', $village->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION village</div>
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
                                        <label>Nom</label>
                                    <input type="text" name="nomv" class="form-control" value="{{$village->nomv}}"   required>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="number" name="latitudev"  value="{{$village->latitudev }}" step="any" class="form-control" required>
                                    </div>
                                </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Longitude</label>
                                            <input type="number" name="longitudev"  value="{{$village->longitudev }}" step="any" class="form-control" required>
                                        </div>
                                    </div>
                                <div class="col-lg-6">
                                    <label>Région</label>
                                    <select class="form-control" name="commune_id" required="">
                                        @foreach ($communes as $commune)
                                        <option {{old('commune_id', $village->commune_id) == $commune->id ? 'selected' : ''}}
                                            value="{{$commune->id}}">{{$commune->nomc}}</option>
                                            @endforeach

                                    </select>
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
