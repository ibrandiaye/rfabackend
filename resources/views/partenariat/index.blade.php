@extends('layouts.partanariat')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $nbPartenariats }}</h4>
                        <p>Total Partenariats</p>
                    </div>
                    <i class="fa-solid fa-file fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $nbPartenariatsEnCours }}</h4>
                        <p>Partenariats en cours</p>
                    </div>
                    <i class="fa-solid fa-file fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ $nbPartenariats - $nbPartenariatsEnCours }}</h4>
                        <p>Partenariats achevés</p>
                    </div>

                    <i class="fa-solid fa-file fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row">
    @foreach($nbPartenariatByCategories as $key => $value)
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>{{ $value->total }}</h4>
                            <p>{{ $value->volet_partenariat }}</p>
                        </div>

                        <i class="fa-solid fa-stat fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="card">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">📋 Liste des Partenariats</h4>
        <a href="{{ route('partenariat.create') }}" class="btn btn-success btn-custom">➕ Ajouter</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Partenaire</th>
                        <th>Volet</th>
                        <th>Contact</th>
                        <th>Convention</th>
                        <th>Année</th>
                        <th>État</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($partenariats as $part)
                    <tr>
                        <td>{{ $part->numero }}</td>
                        <td>{{ $part->denomination_partenaire }}</td>
                        <td>{{ $part->volet_partenariat }}</td>
                        <td>{{ $part->personne_contact }}</td>
                        <td>
                            <span class="badge {{ $part->signature_convention == 'Oui' ? 'badge-success' : '' }}">
                                {{ $part->signature_convention }}
                            </span>
                        </td>
                        <td>{{ $part->annee }}</td>
                        <td>{{ $part->etat_avancement }}</td>
                        <td class="text-center">
                            <a href="{{ route('partenariat.edit', $part) }}" class="btn btn-warning btn-sm btn-custom">✏️</a>
                            <form action="{{ route('partenariat.destroy', $part) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-custom" onclick="return confirm('Supprimer ce partenariat ?')">🗑️</button>
                            </form>
                            <a href="{{ route('partenariat.show', $part) }}" class="btn btn-info btn-sm btn-custom">👁️</a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Aucun partenariat trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
          <!-- Pagination -->
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                {{ $partenariats->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
