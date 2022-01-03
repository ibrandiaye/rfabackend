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
                            <li class="breadcrumb-item"><a href="{{ route('go.menu',['projet_id'=>$activite->projet_id]) }}" role="button" class="btn btn-primary">Menu</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('activite.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($activite, ['method'=>'PATCH','route'=>['activite.update', $activite->id]]) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION D'une activite</div>
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
                                    <label>nom Activite</label>
                                    <input type="text" name="nom"  value="{{ $activite->nom }}" class="form-control"  required>
                                </div>
                            </div>
                            {{--  <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                      </span>
                                    </div>
                                    <input type="text" name="daterange" class="form-control float-right" id="reservation">
                                 </div>
                            </div>  --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date Debut</label>
                                    <input type="date" name="debut" id="from"  value="{{ $activite->debut}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date Fin</label>
                                    <input type="date" name="fin"  id="to" value="{{ $activite->fin }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label>Résultats obtenus (Livrables)</label>
                                <textarea class="textarea" name="rts" placeholder="Place some text here"
                                          style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $activite->rts }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Etat</label>
                                <select class="form-control" name="etat" required="">
                                    <option value="">Veuillez sélectionner</option>
                                    <option value="non realise" {{ $activite->etat == 'non realise'? 'selected' : '' }}>non realise</option>
                                    <option value="realise" {{ $activite->etat == 'realise'? 'selected' : '' }}>realise</option>

                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Responsable</label>
                                    <input type="text" name="responsable"  value="{{ $activite->responsable }}" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email Responsable</label>
                                    <input type="email" name="email"  value="{{  $activite->email }}" class="form-control"  required>
                                </div>
                            </div>

                            <input type="hidden" name="projet_id" value="{{ $activite->projet_id }}" required>
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
