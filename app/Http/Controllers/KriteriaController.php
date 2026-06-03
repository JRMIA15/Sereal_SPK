<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Kriteria::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }
        
        $kriterias = $query->orderBy('code', 'asc')->get();
        $totalWeight = Kriteria::sum('weight');
        $isValidWeight = (abs($totalWeight - 100.0) < 0.001);

        return view('kriteria.index', compact('kriterias', 'totalWeight', 'isValidWeight', 'search'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:5|unique:kriteria,code',
            'name' => 'required|string|max:255',
            'type' => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        Kriteria::create($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan!');
    }

    public function edit(Kriteria $kriterium) // Using Breeze/Laravel resource binding name matching table singular
    {
        return view('kriteria.edit', ['kriteria' => $kriterium]);
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:5|unique:kriteria,code,' . $kriterium->id,
            'name' => 'required|string|max:255',
            'type' => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        $kriterium->update($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui!');
    }

    public function destroy(Kriteria $kriterium)
    {
        // Detach related cereals in pivot table first to prevent DB foreign key constraint errors
        $kriterium->sereals()->detach();
        Kriteria::destroy($kriterium->id);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
