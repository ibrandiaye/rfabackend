<?php

namespace App\Http\Controllers;

use App\OddProject;
use App\OddResult;
use App\Odd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OddDashboardController extends Controller
{
    public function index()
    {
        // KPI Cards
        $totalProjects = OddProject::count();
        $totalResults = OddResult::count();
        $addressedOddsCount = OddResult::distinct('odd_id')->count('odd_id');

        // Chart: Results per SDG
        $allOdds = Odd::withCount('results')->orderBy('number')->get();
        
        $labels = $allOdds->pluck('number')->map(function($num) {
            return "ODD " . $num;
        });
        $dataResults = $allOdds->pluck('results_count');

        // Chart: Projects by Status
        $projectsByStatus = OddProject::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        
        $statusLabels = $projectsByStatus->pluck('status');
        $statusData = $projectsByStatus->pluck('total');

        return view('odd.dashboard', compact(
            'totalProjects', 'totalResults', 'addressedOddsCount',
            'labels', 'dataResults',
            'statusLabels', 'statusData',
            'allOdds'
        ));
    }
}
