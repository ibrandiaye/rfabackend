{{-- \resources\views\permissions\create.blade.php --}}
@extends('appelprojet.welcome')

@section('title', '| Un Activité')

@section('content')
    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Détail d'une appel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('appel.index') }}" role="button" class="btn btn-primary">Détail d'une activité</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
                    <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-text-width"></i>
                              Détail Activité
                            </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Secteur</dt>
                              <dd class="col-sm-8">
                                {{ $appel->secteur }}
                              </dd>
                              <dt class="col-sm-4">Titre</dt>
                              <dd class="col-sm-8">
                                {!! $appel->titre !!}
                              </dd>
                              <dt class="col-sm-4">Theme</dt>
                              <dd class="col-sm-8">
                                {!! $appel->theme !!}
                              </dd>
                              <dt class="col-sm-4">pays</dt>
                              <dd class="col-sm-8">
                                {{ $appel->pays }}
                              </dd>
                              <dt class="col-sm-4">Region</dt>
                              <dd class="col-sm-8">
                                {{ $appel->region }}
                              </dd>
                              <dt class="col-sm-4">Ct</dt>
                              <dd class="col-sm-8">
                                {{ $appel->ct }}
                              </dd>
                              <dt class="col-sm-4">type</dt>
                              <dd class="col-sm-8">
                                {{ $appel->type->nom }}
                              </dd>
                              <dt class="col-sm-4">Ligne d'action</dt>
                              <dd class="col-sm-8">
                                {{ $appel->ligne }}
                              </dd>
                              <dt class="col-sm-4">Axe</dt>
                              <dd class="col-sm-8">
                                {{ $appel->axe }}
                              </dd>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-text-width"></i>
                              Détail Activité
                            </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4">Date Réception</dt>
                              <dd class="col-sm-8">
                                {{  Carbon\Carbon::parse( $appel->dater)->format('d-m-Y') }}
                              </dd>
                              <dt class="col-sm-4">Traitement ou exploitation</dt>
                              <dd class="col-sm-8">
                                {{  Carbon\Carbon::parse( $appel->datet)->format('d-m-Y') }}
                              </dd>
                              <dt class="col-sm-4">Réunion Brainstorming</dt>
                              <dd class="col-sm-8">
                                {{  Carbon\Carbon::parse( $appel->dateb)->format('d-m-Y') }}
                              </dd>
                              <dt class="col-sm-4">Statut</dt>
                              <dd class="col-sm-8">
                                {{ $appel->etat }}
                              </dd>
                              <dt class="col-sm-4">Date soumission</dt>
                              <dd class="col-sm-8">
                                {{  Carbon\Carbon::parse( $appel->dates)->format('d-m-Y') }}
                              </dd>

                              <dt class="col-sm-4">Montant</dt>
                              <dd class="col-sm-8">
                                {{ $appel->montant }}
                              </dd>
                              <dt class="col-sm-4">Personne(s) impliquée(s)</dt>
                              <dd class="col-sm-8">
                                {{ $appel->personne }}
                              </dd>
                              <dt class="col-sm-4">Document</dt>
                              <dd class="col-sm-8">
                                @foreach($appel->docAppels as $key => $value)
                                    <a href="/bdprojetenda/doc/{{ $value->nomdoc }}"  > Document {{ $key }}</a></dd>

                                @endforeach
                                </dl>
                                 <dt class="col-sm-4">Utilisateur</dt>
                              <dl class="col-sm-8">
                               @if(!empty($appel->user))
                                {{ $appel->user->name }}
                               @endif
                              </dl>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <div class="col-12">
                        <div class="card border-danger border-0">
                            <div class="card-header bg-info text-center">                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                Ajouter à la matrice
                              </button></div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Appel</th>
                                                <th>Tâche</th>
                                                <th>Responsable</th>
                                                <th>Date Limite</th>
                                                <th>Personnes Impliquées</th>
                                                <th>Commentaire</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($appel->matrices as $matrice)
                                            <tr>
                                                <td>{!! $matrice->appel->titre !!}</td>
                                                <td>{{ $matrice->tache }}</td>
                                                <td>{{ $matrice->employe->nom }}</td>
                                                <td>{{  Carbon\Carbon::parse( $matrice->datelimite )->format('d-m-Y') }}</td>
                                                <td>{{ $matrice->personneimplique }}</td>
                                                <td>{{ $matrice->comentaire }}</td>
                                                <td>
                                                    <a href="{{ route('matrice.edit', $matrice->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('matrice.show', $matrice->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                                    {!! Form::open(['method' => 'DELETE', 'route'=>['matrice.destroy', $matrice->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    {!! Form::close() !!}



                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>



                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card border-danger border-0">
                                <div class="card-header bg-info text-center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default1">
                                    Ajouter un Ressource
                                  </button></div>
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-responsive-md table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Document</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($documents as $document)
                                                <tr>

                                                    <td>{{ $document->intitule }}</td>
                                                    <td> <a href="{{ asset('doc/'.$document->nom) }}" class="btn btn-info" target="blank"><i class="fas fa-eye" title="Voir document"></i></a></td>
                                                    <td>
                                                        <button  role="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-document{{ $document->id }}"><i class="fas fa-edit"></i></button>
                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['document.destroy', $document->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                        {!! Form::close() !!}


                                                        <div class="modal fade" id="modal-document{{ $document->id }}">
                                                            {!! Form::model($document, ['method'=>'PATCH','route'=>['document.update', $document->id]," enctype"=>"multipart/form-data"]) !!}
                                                            @csrf
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <h4 class="modal-title">Modifier Ressource  {{ $document->intitule }}</h4>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Intitule Ressource</label>
                                                                                <input type="text" name="intitule"  value="{{ $document->intitule }}" class="form-control"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label>Ressource </label>
                                                                                <input type="file" name="doc"   class="form-control"  >
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="appel_id" value="{{  $appel->id }}">


                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                  <button type="submit" class="btn btn-primary">Ajouter</button>
                                                                </div>
                                                              </div>
                                                              <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>



                                    </div>

                                </div>
                            </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>

            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <form action="{{ route('matrice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ajouer à la matrice</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tâche</label>
                                <input type="text" name="tache"  value="{{ old('tache') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Date limite </label>
                                <input type="date" name="datelimite"  value="{{ old('datelimite') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Personnes impliquées  </label>
                                <textarea name="personneimplique" id=""  class="form-control"  cols="30" rows="5">{{ old('personneimplique') }}</textarea>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Commentaire</label>
                                <textarea name="comentaire" id="" cols="30"  class="form-control"  rows="5">{{ old('comentaire') }}</textarea>

                            </div>
                        </div>
                        <div class="col-lg-12">
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
                        <input type="hidden" name="appel_id" value="{{  $appel->id }}">
                        <input type="hidden" name="appel" value="appelS">


                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </form>
          </div>

          <div class="modal fade" id="modal-default1">
            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ajouter Ressource</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Intitule Ressource</label>
                                <input type="text" name="intitule"  value="{{ old('intitule') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Ressource </label>
                                <input type="file" name="doc"   class="form-control"  required>
                            </div>
                        </div>

                        <input type="hidden" name="appel_id" value="{{  $appel->id }}">


                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </form>
          </div>

@endsection

<script src=" {{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
