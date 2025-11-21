@extends('appelprojet.welcome')
@section('title', '| appel')


@section('content')

<div class="content-wrapper">
        <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-info">Liste des appels</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('appel.create') }}" role="button" class="btn btn-primary">Liste des appels</a></li>
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
        <div class="card-header bg-info text-center">LISTE D'ENREGISTREMENT du canevas de reporting</div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                        <tr>
                            <th>type</th>
                            <th>reference</th>
                            <th>titre</th>
                            <th>theme/secteur</th>
                            <th>Pays</th>
                            <th>Régions</th>
                            <th>Organisation Partenaire</th>
                            <th>Budget prevu</th>
                            <th>Date Réception</th>
                            {{-- <th>document</th> --}}
                            <th>Date Soumission</th>
                            <th>Date limite de soumission</th>
                            <th>Personnes impliquées</th>
                            <th>Axe stratégique</th>
                            <th>Lignes d'action et statut</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($appels as $appel)
                        <tr>
                            <td>{{ $appel->type->nom }}</td>
                            <td>{{ $appel->reference }}</td>
                            <td>{!! $appel->titre !!}</td>
                            <td>{!! $appel->theme !!}</td>
                            <td>{{ $appel->pays }}</td>
                            <td>{{ $appel->region }}</td>
                            <td>{{ $appel->association }}</td>
                            <td>{{ $appel->montant }}</td>
                             <td>{{  Carbon\Carbon::parse( $appel->dater)->format('d-m-Y') }}</td>
                            {{--<td>{{  Carbon\Carbon::parse( $appel->datet)->format('d-m-Y') }}</td>
                            <td>{{  Carbon\Carbon::parse( $appel->dateb)->format('d-m-Y') }}</td>
                            {{-- <td><a href="/doc/{{ $appel->document }}" ><button class="btn btn-info"><i class="far fa-save"></i><ion-icon name="document-outline"></ion-icon></button></a></td> --}}
                            <td>{{  Carbon\Carbon::parse( $appel->dates)->format('d-m-Y') }}</td>
                            <td>{{  Carbon\Carbon::parse( $appel->dateexp)->format('d-m-Y') }}</td>
                            <td>{{ $appel->personne }}</td>
                            <td>{{ $appel->axe }}</td>
                            <td>{{ $appel->ligne }}</td>
                             <td>{{ $appel->etat }}</td>
                            <td>
                                <a href="{{ route('appel.edit', $appel->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('appel.show', $appel->id) }}" role="button" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['appel.destroy', $appel->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
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


</div>
{{-- {{-- <div class="col-lg-6">
    <div class="col-lg-6">
        <div class="form-group">
            <label>Titre</label>
            <textarea class="textarea" name="titre" placeholder="Place some text here"
            style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $appel->titre }}</textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Thème</label>
            <textarea class="textarea" name="theme" placeholder="Place some text here"
            style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $appel->theme }}</textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Secteur</label>
            <input type="text" name="secteur"  value="{{  $appel->ecteur }}" class="form-control"  required>
        </div>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="type_id" required>
            <option value="">Faites un choix</option>
            @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ $appel->type_id==$type->id ? 'selected' : '' }}>{{ $type->nom }} </option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label>Pays</label>
        <input type="text" name="pays"  value="{{ $appel->pays }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Région</label>
        <input type="text" name="region"  value="{{ $appel->region }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>CT</label>
        <input type="text" name="ct"  value="{{ $appel->ct }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>organisation partenaire</label>
        <input type="text" name="association"  value="{{ $appel->association }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Montant</label>
        <input type="text" name="montant"  value="{{ $appel->montant }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Bailleur</label>
        <input type="text" name="bailleur"  value="{{ $appel->bailleur }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Date Réception</label>
        <input type="date" name="dater"  value="{{ $appel->dater }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Date d’exploitation en ligne</label>
        <input type="date" name="datet"  value="{{ $appel->datet }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Reunion brainstorming</label>
        <input type="date" name="dateb"  value="{{ $appel->dateb }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Date de Soumission</label>
        <input type="date" name="dates"  value="{{ $appel->dates }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Date limite de soumission</label>
        <input type="date" name="dateexp"  value="{{ $appel->dateexp }}" class="form-control"  required>
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label>Personne Impliqué</label>
        <input type="text" name="personne"  value="{{ $appel->personne }}" class="form-control"  required>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label >Choisir un fichier</label>
            <input name="doc" type="file" class="form-control" id="exampleInputFile">
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label>Statut</label>
        <select class="form-control" name="etat" required>
            <option value="">Faites un choix</option>
            <option value="En cours" {{ $appel->etat=='En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Approuve" {{ $appel->etat=='Approuve' ? 'selected' : '' }}>Approuve</option>
            <option value="Non approuve" {{ $appel->etat=='Non approuve' ? 'selected' : '' }}>Non approuve</option>
        </select>
    </div>
</div> --}}

@endsection
