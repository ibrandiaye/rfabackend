{{-- \resources\views\permissions\create.blade.php --}}
@extends('appelprojet.welcome')

@section('title', '| Modifier matrice')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Modifier matrice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('type.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($matrice, ['method'=>'PATCH','route'=>['matrice.update', $matrice->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION  MATRICE</div>
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
                                        <label>Tâche</label>
                                        <input type="text" name="tache"  value="{{ $matrice->tache }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date limite </label>
                                        <input type="date" name="datelimite"  value="{{ $matrice->datelimite }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Personnes impliquées  </label>
                                        <textarea name="personneimplique" id=""  class="form-control"  cols="30" rows="10">{{ $matrice->personneimplique }}</textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Commentaire</label>
                                        <textarea name="comentaire" id="" cols="30"  class="form-control" rows="10">{{ $matrice->comentaire }}</textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                        <select class="form-control" name="employe_id" required>
                                            <option value="">Faites un choix</option>
                                            @foreach ($employes as $employe)
                                            <option value="{{ $employe->id }}" {{ $matrice->employe_id==$employe->id ? 'selected' : '' }}>{!! $employe->nom !!} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                        <select class="form-control" name="appel_id" required>
                                            <option value="">Faites un choix</option>
                                            @foreach ($appels as $appel)
                                            <option value="{{ $appel->id }}" {{ $matrice->appel_id==$appel->id ? 'selected' : '' }}>{!! $appel->titre !!} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <center>
                                        <button type="submit"  class="btn btn-success btn btn-lg "> MODIFIER</button>
                                    </center>
                                </div>


                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
