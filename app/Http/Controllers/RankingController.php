<?php

namespace App\Http\Controllers;

use App\Models\Sereal;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('code', 'asc')->get();
        $sereals = Sereal::with('kriterias')->get();

        if ($kriterias->isEmpty() || $sereals->isEmpty()) {
            return view('ranking', [
                'rankings' => [],
                'kriterias' => $kriterias,
                'bestAlternative' => null,
            ]);
        }

        // Step 1: Find min and max values for each criteria
        $minMax = [];
        foreach ($kriterias as $kriteria) {
            $values = $sereals->map(function ($sereal) use ($kriteria) {
                $pivotVal = $sereal->kriterias->firstWhere('id', $kriteria->id);
                return $pivotVal ? floatval($pivotVal->pivot->value) : null;
            })->filter(function ($value) {
                return $value !== null;
            })->values()->all();

            $minMax[$kriteria->id] = [
                'max' => !empty($values) ? max($values) : 0.0,
                'min' => !empty($values) ? min($values) : 0.0,
            ];
        }

        // Step 2: Normalize weights (w_j = weight_j / total_weight)
        $totalWeight = $kriterias->sum('weight');
        $normalizedWeights = [];
        foreach ($kriterias as $kriteria) {
            $normalizedWeights[$kriteria->id] = $totalWeight > 0 ? floatval($kriteria->weight) / $totalWeight : 0.0;
        }

        // Step 3 & 4: Normalize matrix and calculate preference score (V_i = Σ w_j * r_ij)
        $rankings = [];
        foreach ($sereals as $sereal) {
            $normalized = [];
            $score = 0.0;

            foreach ($kriterias as $kriteria) {
                $pivotVal = $sereal->kriterias->firstWhere('id', $kriteria->id);
                $val = $pivotVal ? floatval($pivotVal->pivot->value) : 0.0;

                $max = $minMax[$kriteria->id]['max'];
                $min = $minMax[$kriteria->id]['min'];

                // Normalisasi matriks (R)
                $r = 0.0;
                if ($kriteria->type === 'benefit') {
                    // Benefit: r_ij = x_ij / max_j(x_ij)
                    if ($max > 0) {
                        $r = $val / $max;
                    }
                } else {
                    // Cost: r_ij = min_j(x_ij) / x_ij
                    if ($val > 0 && $min > 0) {
                        $r = $min / $val;
                    } elseif ($val === 0.0 && $min === 0.0) {
                        $r = 1.0;
                    }
                }

                $normalized[$kriteria->id] = $r;
                $score += ($normalizedWeights[$kriteria->id] ?? 0.0) * $r;
            }

            $rankings[] = [
                'sereal' => $sereal,
                'normalized' => $normalized,
                'score' => round($score, 4),
            ];
        }

        // Step 4: Sort rankings descending by score
        usort($rankings, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Find the best alternative
        $bestAlternative = !empty($rankings) ? $rankings[0] : null;

        return view('ranking', [
            'rankings' => $rankings,
            'kriterias' => $kriterias,
            'bestAlternative' => $bestAlternative,
        ]);
    }
}
