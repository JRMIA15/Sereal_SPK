<?php

namespace App\Http\Controllers;

use App\Models\Sereal;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SerealController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Sereal::query();
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }
        
        // Eager load kriterias to prevent N+1 queries
        $sereals = $query->with('kriterias')->orderBy('name')->get();
        $kriterias = Kriteria::orderBy('code', 'asc')->get();

        return view('sereal.index', compact('sereals', 'kriterias', 'search'));
    }

    public function create()
    {
        $kriterias = Kriteria::orderBy('code', 'asc')->get();
        return view('sereal.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kriteria_values' => 'required|array',
            'kriteria_values.*' => 'required|numeric|min:0',
        ]);

        $sereal = Sereal::create([
            'name' => $validated['name'],
        ]);

        $syncData = [];
        foreach ($validated['kriteria_values'] as $kriteriaId => $value) {
            $syncData[$kriteriaId] = ['value' => $value];
        }
        $sereal->kriterias()->sync($syncData);

        return redirect()->route('sereal.index')->with('success', 'Sereal dan nilai gizi berhasil ditambahkan!');
    }

    public function edit(Sereal $sereal)
    {
        $kriterias = Kriteria::orderBy('code', 'asc')->get();
        
        // Map the current pivot values by kriteria_id for easy form binding
        $currentValues = $sereal->kriterias->pluck('pivot.value', 'id')->toArray();

        return view('sereal.edit', compact('sereal', 'kriterias', 'currentValues'));
    }

    public function update(Request $request, Sereal $sereal)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'kriteria_values' => 'required|array',
            'kriteria_values.*' => 'required|numeric|min:0',
        ]);

        $sereal->update([
            'name' => $validated['name'],
        ]);

        $syncData = [];
        foreach ($validated['kriteria_values'] as $kriteriaId => $value) {
            $syncData[$kriteriaId] = ['value' => $value];
        }
        $sereal->kriterias()->sync($syncData);

        return redirect()->route('sereal.index')->with('success', 'Sereal dan nilai gizi berhasil diperbarui!');
    }

    public function destroy(Sereal $sereal)
    {
        $sereal->kriterias()->detach();
        Sereal::destroy($sereal->id);

        return redirect()->route('sereal.index')->with('success', 'Sereal berhasil dihapus!');
    }
}
