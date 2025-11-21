@extends('appelprojet.welcome')
@section('title', '| document')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Liste des documents</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="#" role="button" class="btn btn-primary">Liste des documents</a></li>
                                </ol>
                            </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
            </div>

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
<div class="col-12">
    <div class="card border-danger border-0">
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT DES DOCUMENTS</div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>Projet</th>
                            <th>Nom</th>
                            <th>Document</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{!! $document->projet !!}</td>
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
                                          <h4 class="modal-title">Modifier Document  {{ $document->intitule }}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Intitule Document</label>
                                                        <input type="text" name="intitule"  value="{{ $document->intitule }}" class="form-control"  required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Document </label>
                                                        <input type="file" name="doc"   class="form-control"  >
                                                    </div>
                                                </div>

                                                <input type="hidden" name="appel_id" value="{{  $document->appel_id }}">


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

@endsection
