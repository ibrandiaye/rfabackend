<?php

namespace App\Http\Controllers;

use App\OddProject;
use App\Odd;
use Illuminate\Http\Request;

class OddProjectController extends Controller
{
    public function index()
    {
        $projects = OddProject::orderBy('created_at', 'desc')->paginate(10);
        return view('odd.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('odd.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'zone' => 'required|string',
            'secteur' => 'required|string',
            'status' => 'required|in:en cours,terminé,suspendu',
        ]);

        OddProject::create($request->all());

        return redirect()->route('odd.projects.index')->with('success', 'Projet ODD créé avec succès.');
    }

    public function show($id)
    {
        $project = OddProject::with('results.odd', 'results.target', 'results.evidences')->findOrFail($id);
        $odds = Odd::all();
        return view('odd.projects.show', compact('project', 'odds'));
    }

    public function edit($id)
    {
        $project = OddProject::findOrFail($id);
        return view('odd.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'zone' => 'required|string',
            'secteur' => 'required|string',
            'status' => 'required|in:en cours,terminé,suspendu',
        ]);

        $project = OddProject::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('odd.projects.index')->with('success', 'Projet ODD mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $project = OddProject::findOrFail($id);
        $project->delete();

        return redirect()->route('odd.projects.index')->with('success', 'Projet ODD supprimé avec succès.');
    }
}
