@extends('layouts.odd')

@section('title', 'Détails du Projet : ' . $project->title)

@section('actions')
<a href="{{ route('odd.projects.index') }}" class="btn btn-outline-secondary">
    <i class="fas fa-arrow-left"></i> Retour à la liste
</a>
@endsection

@section('content')
<div class="row g-4">
    <!-- Project Sidebar -->
    <div class="col-lg-4">
        <div class="card p-4 mb-4">
            <h5 class="fw-bold mb-3 border-bottom pb-2">Informations Générales</h5>
            <div class="mb-3">
                <label class="text-muted small text-uppercase d-block">Période</label>
                <span class="fw-bold">
                    {{ \Carbon\Carbon::parse($project->date_debut)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($project->date_fin)->format('d/m/Y') }}
                </span>
            </div>
            <div class="mb-3">
                <label class="text-muted small text-uppercase d-block">Zone Géographique</label>
                <span class="fw-bold">{{ $project->zone }}</span>
            </div>
            <div class="mb-3">
                <label class="text-muted small text-uppercase d-block">Secteur d'Intervention</label>
                <span class="fw-bold text-info">{{ $project->secteur }}</span>
            </div>
            <div class="mb-3">
                <label class="text-muted small text-uppercase d-block">Statut</label>
                @php
                    $badgeClass = [
                        'en cours' => 'bg-info',
                        'terminé' => 'bg-success',
                        'suspendu' => 'bg-danger'
                    ][$project->status] ?? 'bg-secondary';
                @endphp
                <span class="badge {{ $badgeClass }}">{{ ucfirst($project->status) }}</span>
            </div>
            @if($project->description)
            <div class="mb-0">
                <label class="text-muted small text-uppercase d-block">Description</label>
                <p class="mb-0">{{ $project->description }}</p>
            </div>
            @endif
        </div>

        <div class="card p-4 bg-light border-dashed">
            <h5 class="fw-bold mb-3">Nouvelle Réalisation</h5>
            <form action="{{ route('odd.results.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="odd_project_id" value="{{ $project->id }}">
                
                <div class="mb-3">
                    <label for="odd_id" class="form-label small fw-bold">ODD Concerné</label>
                    <select class="form-select" id="odd_id" name="odd_id" required>
                        <option value="">Sélectionner un ODD</option>
                        @foreach($odds as $odd)
                            <option value="{{ $odd->id }}">ODD {{ $odd->number }} - {{ $odd->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="odd_target_id" class="form-label small fw-bold">Cible ODD</label>
                    <select class="form-select" id="odd_target_id" name="odd_target_id" required disabled>
                        <option value="">Sélectionner une cible</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label small fw-bold">Réalisation / Résultat</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Décrivez le résultat obtenu..."></textarea>
                </div>

                <div class="mb-3">
                    <label for="files" class="form-label small fw-bold">Preuves (Images/Rapports)</label>
                    <input type="file" class="form-control" id="files" name="files[]" multiple>
                    <div class="form-text small">Plusieurs fichiers autorisés.</div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Enregistrer la Réalisation</button>
            </form>
        </div>
    </div>

    <!-- Results List -->
    <div class="col-lg-8">
        <h5 class="fw-bold mb-3"><i class="fas fa-list text-primary me-2"></i>Réalisations Enregistrées</h5>
        
        @forelse($project->results as $result)
        <div class="card p-0 overflow-hidden mb-4 border-0 shadow-sm">
            <div class="p-3 bg-light d-flex justify-content-between align-items-center border-bottom">
                <div>
                    <span class="badge bg-primary me-2">ODD {{ $result->odd->number }} : {{ $result->odd->title }}</span>
                    <span class="fw-bold text-secondary">Cible {{ $result->target->number }}</span>
                </div>
                <div class="text-muted small">
                    <i class="far fa-clock me-1"></i> {{ $result->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
            <div class="p-4">
                <p class="mb-3 fw-medium">{{ $result->description }}</p>
                
                @if($result->evidences->count() > 0)
                <div class="mt-3">
                    <h6 class="text-muted small text-uppercase mb-2">Documents & Preuves</h6>
                    <div class="row g-2">
                        @foreach($result->evidences as $evidence)
                        <div class="col-md-4 col-6">
                            @if($evidence->type == 'image')
                            <a href="{{ asset('storage/' . $evidence->path) }}" target="_blank" class="text-decoration-none">
                                <div class="card p-1 border shadow-none bg-white h-100">
                                    <img src="{{ asset('storage/' . $evidence->path) }}" alt="{{ $evidence->name }}" class="img-fluid rounded" style="height: 100px; object-fit: cover;">
                                    <div class="small text-muted p-1 text-truncate">{{ $evidence->name }}</div>
                                </div>
                            </a>
                            @else
                            <a href="{{ asset('storage/' . $evidence->path) }}" target="_blank" class="text-decoration-none">
                                <div class="card p-3 border shadow-none bg-white h-100 text-center">
                                    <i class="fas fa-file-pdf fa-2x text-danger mb-2"></i>
                                    <div class="small text-dark text-truncate">{{ $evidence->name }}</div>
                                </div>
                            </a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="p-3 bg-white border-top text-end">
                <form action="{{ route('odd.results.destroy', $result->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette réalisation ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-link text-danger text-decoration-none">
                        <i class="fas fa-trash me-1"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="card p-5 text-center text-muted">
            <i class="fas fa-clipboard-list fa-3x mb-3 opacity-20"></i>
            <p>Aucune réalisation enregistrée pour le moment.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#odd_id').change(function() {
            const oddId = $(this).val();
            const targetSelect = $('#odd_target_id');
            
            targetSelect.empty().append('<option value="">Chargement...</option>').prop('disabled', true);
            
            if (oddId) {
                $.get("{{ url('odd/targets') }}/" + oddId, function(data) {
                    targetSelect.empty().append('<option value="">Sélectionner une cible</option>');
                    data.forEach(function(target) {
                        targetSelect.append('<option value="' + target.id + '">' + target.number + ' - ' + target.description.substring(0, 100) + '...</option>');
                    });
                    targetSelect.prop('disabled', false);
                });
            } else {
                targetSelect.empty().append('<option value="">Sélectionner une cible</option>').prop('disabled', true);
            }
        });
    });
</script>
@endsection
