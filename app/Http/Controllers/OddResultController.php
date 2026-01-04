<?php

namespace App\Http\Controllers;

use App\OddResult;
use App\OddEvidence;
use App\OddTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OddResultController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'odd_project_id' => 'required|exists:odd_projects,id',
            'odd_id' => 'required|exists:odds,id',
            'odd_target_id' => 'required|exists:odd_targets,id',
            'description' => 'required|string',
            'files.*' => 'nullable|file|max:10240', // 10MB max
        ]);

        $result = OddResult::create($request->only([
            'odd_project_id', 'odd_id', 'odd_target_id', 'description'
        ]));

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $type = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'rapport';
                
                $path = $file->store('odd_evidences', 'public');

                OddEvidence::create([
                    'odd_result_id' => $result->id,
                    'type' => $type,
                    'path' => $path,
                    'name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return back()->with('success', 'Réalisation enregistrée avec succès.');
    }

    public function getTargets($oddId)
    {
        $targets = OddTarget::where('odd_id', $oddId)->get();
        return response()->json($targets);
    }

    public function destroy($id)
    {
        $result = OddResult::findOrFail($id);
        
        foreach ($result->evidences as $evidence) {
            Storage::disk('public')->delete($evidence->path);
            $evidence->delete();
        }
        
        $result->delete();

        return back()->with('success', 'Réalisation supprimée avec succès.');
    }
}
