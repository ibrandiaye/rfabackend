@extends('layouts.odd')

@section('title', 'Tableau de Bord ODD')

@section('content')
<div class="row g-4 mb-4">
    <!-- KPI Cards -->
    <div class="col-md-4">
        <div class="card p-4 h-100 bg-primary text-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1" style="opacity: 0.8">Total Projets</h6>
                    <h2 class="mb-0">{{ $totalProjects }}</h2>
                </div>
                <i class="fas fa-project-diagram fa-3x" style="opacity: 0.3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100 bg-success text-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1" style="opacity: 0.8">Réalisations Enregistrées</h6>
                    <h2 class="mb-0">{{ $totalResults }}</h2>
                </div>
                <i class="fas fa-check-circle fa-3x" style="opacity: 0.3"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 h-100 bg-info text-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1" style="opacity: 0.8">ODD Adressés</h6>
                    <h2 class="mb-0">{{ $addressedOddsCount }} / 17</h2>
                </div>
                <i class="fas fa-globe-africa fa-3x" style="opacity: 0.3"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Main Chart: Results per SDG -->
    <div class="col-lg-8">
        <div class="card p-4">
            <h5 class="card-title mb-4">Nombre de réalisations par ODD</h5>
            <div style="position: relative; height: 400px; width: 100%;">
                <canvas id="resultsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Side Chart: Projects by Status -->
    <div class="col-lg-4">
        <div class="card p-4">
            <h5 class="card-title mb-4">Statut des projets</h5>
            <div style="position: relative; height: 400px; width: 100%;">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-12">
        <div class="card p-4">
            <h5 class="card-title mb-4">Vue d'ensemble par ODD</h5>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                @foreach ($allOdds as $odd)
                <div class="col">
                    <div class="d-flex align-items-center p-3 rounded h-100" style="background: #f1f5f9; border: 1px solid #e2e8f0;">
                        <div class="flex-shrink-0 me-3">
                            <span class="badge bg-white text-primary border shadow-sm p-2" style="font-size: 1.1rem; min-width: 50px;">
                                {{ $odd->number }}
                            </span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-bold text-truncate" title="{{ $odd->title }}">{{ $odd->title }}</div>
                            <div class="text-muted small">{{ $odd->results_count }} réalisations</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Results Chart
    const ctxResults = document.getElementById('resultsChart').getContext('2d');
    new Chart(ctxResults, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Réalisations',
                data: {!! json_encode($dataResults) !!},
                backgroundColor: 'rgba(14, 165, 233, 0.6)',
                borderColor: 'rgba(14, 165, 233, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });

    // Status Chart
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($statusLabels) !!},
            datasets: [{
                data: {!! json_encode($statusData) !!},
                backgroundColor: [
                    '#3b82f6', // blue
                    '#22c55e', // green
                    '#ef4444'  // red
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
