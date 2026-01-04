@extends('layouts.odd')

@section('title', 'Modifier le Projet ODD')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4">
            <form action="{{ route('odd.projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Titre du Projet</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description (Optionnel)</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date_debut" class="form-label fw-bold">Date de début</label>
                        <input type="date" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut', $project->date_debut) }}" required>
                        @error('date_debut')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date_fin" class="form-label fw-bold">Date de fin</label>
                        <input type="date" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" name="date_fin" value="{{ old('date_fin', $project->date_fin) }}" required>
                        @error('date_fin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="zone" class="form-label fw-bold">Zone géographique</label>
                        <input type="text" class="form-control @error('zone') is-invalid @enderror" id="zone" name="zone" value="{{ old('zone', $project->zone) }}" required>
                        @error('zone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="secteur" class="form-label fw-bold">Secteur d’intervention</label>
                        <input type="text" class="form-control @error('secteur') is-invalid @enderror" id="secteur" name="secteur" value="{{ old('secteur', $project->secteur) }}" required>
                        @error('secteur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label fw-bold">Statut du projet</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="en cours" {{ old('status', $project->status) == 'en cours' ? 'selected' : '' }}>En cours</option>
                        <option value="terminé" {{ old('status', $project->status) == 'terminé' ? 'selected' : '' }}>Terminé</option>
                        <option value="suspendu" {{ old('status', $project->status) == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('odd.projects.index') }}" class="btn btn-light border">Annuler</a>
                    <button type="submit" class="btn btn-primary px-4">Mettre à jour le Projet</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
