@extends('layouts.odd')

@section('title', 'Gestion des Projets ODD')

@section('actions')
<a href="{{ route('odd.projects.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> Nouveau Projet
</a>
@endsection

@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th>Titre du Projet</th>
                    <th>Période</th>
                    <th>Zone / Secteur</th>
                    <th>Statut</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>
                        <div class="fw-bold text-primary">{{ $project->title }}</div>
                        <small class="text-muted">{{ Str::limit($project->description, 50) }}</small>
                    </td>
                    <td>
                        <div><i class="far fa-calendar-check text-success me-1"></i> {{ \Carbon\Carbon::parse($project->date_debut)->format('d/m/Y') }}</div>
                        <div><i class="far fa-calendar-times text-danger me-1"></i> {{ \Carbon\Carbon::parse($project->date_fin)->format('d/m/Y') }}</div>
                    </td>
                    <td>
                        <div><i class="fas fa-map-marker-alt text-muted me-1"></i> {{ $project->zone }}</div>
                        <div><i class="fas fa-tag text-muted me-1"></i> {{ $project->secteur }}</div>
                    </td>
                    <td>
                        @php
                            $badgeClass = [
                                'en cours' => 'bg-info',
                                'terminé' => 'bg-success',
                                'suspendu' => 'bg-danger'
                            ][$project->status] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($project->status) }}</span>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('odd.projects.show', $project->id) }}" class="btn btn-sm btn-outline-primary" title="Voir les réalisations">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('odd.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-warning" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('odd.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3 d-block"></i>
                        <p class="text-muted">Aucun projet ODD trouvé.</p>
                        <a href="{{ route('odd.projects.create') }}" class="btn btn-primary btn-sm">Créer votre premier projet</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($projects->hasPages())
    <div class="card-footer bg-white border-0">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection
