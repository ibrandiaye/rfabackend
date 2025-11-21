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
                        <h1 class="m-0 text-info">GESTION DES USERS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" role="button" class="btn btn-success">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('user.index') }}" role="button" class="btn btn-success">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($user, ['method'=>'PATCH','route'=>['user.update', $user->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-success text-center">FORMULAIRE DE MODIFICATION TABLE</div>
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
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="name" value="{{ $user->name}}" required autocomplete="email" autofocus placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Mote de Passe</label>
                                        <input id="password" type="password" placeholder="Gardez votre ancienne Mot de passe" class="form-control @error('password') is-invalid @enderror" name="passwords"  autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Repetez Mot de Passe</label>
                                        <input id="password-confirm" type="password" placeholder="Gardez votre ancienne Mot de passe" class="form-control" name="passwords_confirmation"  autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Projet</label>
                                        <select class="form-control" name="projet_id" >
                                            <option value=""> Selectionnez</option>
                                            @foreach ($projets as $projet)
                                            <option value="{{$projet->id}}"  {{ $projet->id==$user->projet_id ? 'selected': '' }} >{{$projet->nom}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" id="role" name="role" required="">
                                            <option value=""> Selectionnez</option>
                                            <option value="admin" {{ "admin"==$user->role ? 'selected': '' }} >Admin</option>
                                            <option value="gestionnaire" {{ "gestionnaire"==$user->role ? 'selected': '' }}>Gestionnaire de Projet (Suivi evaluation)</option>
                                            <option value="sv"  {{ "sv"==$user->role ? 'selected': '' }}>Suivi evaluation</option>
                                            <option value="appel" {{ "appel"==$user->role ? 'selected': '' }}>Suivi Appel à Projet</option>
                                        </select>
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
