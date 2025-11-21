{{-- \resources\views\permissions\create.blade.php --}}
@extends('appelprojet.welcome')

@section('title', '| Enregister Activité')

@section('content')
    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Creer Matrice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('matrice.index') }}" role="button" class="btn btn-primary">LISTE DES MATRICES</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        <form action="{{ route('matrice.store') }}" method="POST" encmatrice="multipart/form-data">
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE D'ENREGISTREMENT D'UNE MATRICE</div>
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
                                        <input type="text" name="tache"  value="{{ old('tache') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date limite </label>
                                        <input type="date" name="datelimite"  value="{{ old('datelimite') }}" class="form-control"  required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Personnes impliquées  </label>
                                        <textarea name="personneimplique" id=""  class="form-control"  cols="30" rows="10">{{ old('personneimplique') }}</textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Commentaire</label>
                                        <textarea name="comentaire" id="" cols="30"  class="form-control"  rows="10">{{ old('comentaire') }}</textarea>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Responsable</label>
                                        <select class="form-control" name="employe_id" required>
                                            <option value="">Faites un choix</option>
                                            @foreach ($employes as $employe)
                                            <option value="{{ $employe->id }}" {{ old('employe_id')==$employe->id ? 'selected' : '' }}>{{ $employe->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Projet</label>
                                        <select class="form-control" name="appel_id" required>
                                            <option value="">Faites un choix</option>
                                            @foreach ($appels as $appel)
                                            <option value="{{ $appel->id }}" {{ old('appel_id')==$appel->id ? 'selected' : '' }}>{!! $appel->titre !!} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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

<script src=" {{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
