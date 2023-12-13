<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Value;

class MabacController extends Controller
{
    public function assessmentFilled()
    {

        //cek apakah sudah ada data di tabel values
        $assessment = Value::all();
        return $assessment->isNotEmpty();
    }

    public function index()
    {
        if (!$this->assessmentFilled()) {
            return redirect()->route('home.index')->with('warning', 'Please fill the assessment first');
        }
        $criteria = Criteria::all();
        $alternative = Alternative::all();
        $value = Value::with(['criteria', 'alternative'])->get();

        $minMax = [];
        $maxXi = [];
        $minXi = [];
        $tij = [];
        $vij = [];
        $g = [];
        $q = [];
        $ranking = [];

        $desireDecimalPlaces = 3; // jumlah angka dibelakang koma

        // Calculate Min-Max values for each criterion
        foreach ($criteria as $criterion) {
            $values = $value->where('criteria_id', $criterion->id)->pluck('value');
            $minMax[$criterion->id] = [
                'min' => $values->min(),
                'max' => $values->max(),
            ];
        }

        // Calculate Max(Xi) and Min(Xi) values for each alternative
        foreach ($alternative as $alt) {
            $maxXi[$alt->id] = $value->where('alternative_id', $alt->id)->max('value');
            $minXi[$alt->id] = $value->where('alternative_id', $alt->id)->min('value');
        }

        // Calculate Tij values
        foreach ($alternative as $alt) {
            foreach ($criteria as $criterion) {
                $tij[$alt->id][$criterion->id] = ($value->where('alternative_id', $alt->id)
                        ->where('criteria_id', $criterion->id)
                        ->pluck('value')
                        ->first() - $minXi[$alt->id]) / ($maxXi[$alt->id] - $minXi[$alt->id]);
            }
        }

        // Calculate Vij values
        foreach ($alternative as $alt) {
            foreach ($criteria as $criterion) {
                $tijObject = (object) $tij[$alt->id];
                $vij[$alt->id][$criterion->id] = $tij[$alt->id][$criterion->id] / $tijObject->sum();
            }
        }

        // Calculate G values
        foreach ($alternative as $alt) {
            $g[$alt->id] = collect($vij[$alt->id])->sum() / count($criteria);
        }

        // Calculate Q values
        foreach ($alternative as $alt) {
            $gObject = (object) $g;
            $q[$alt->id] = $g[$alt->id] / $gObject->sum();
        }

        // Rank alternatives based on Q values
        $ranking = collect($q)->sortDesc()->keys()->toArray();

        // Return the ranking
        return view('dashboard.calculation', [
            'criteria' => $criteria,
            'alternative' => $alternative,
            'value' => $value,
            'minMax' => $minMax,
            'maxXi' => $maxXi,
            'minXi' => $minXi,
            'tij' => $tij,
            'vij' => $vij,
            'g' => $g,
            'q' => $q,
            'ranking' => $ranking,
        ]);
    }

    public function alternativeCalculation()
    {

        if (!$this->assessmentFilled()) {
            return redirect()->route('values.index')->with('warning', 'Please fill the assessment first');
        }
        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $values = Value::with(['criteria', 'alternative'])->get();

        $minMax = [];
        $maxXi = [];
        $minXi = [];
        $tij = [];
        $vij = [];
        $g = [];
        $q = [];
        $ranking = [];

        $desireDecimalPlaces = 3; // jumlah angka dibelakang koma

        foreach ($criterias as $criterion) {
            foreach ($values as $value) {
                if ($criterion->id == $value->criteria_id) {
                    $minMax[$criterion->id][] = $value->value;
                }
            }

            if (!empty($minMax[$criterion->id])) {

                $minMax[$criterion->id] = [
                    'min' => min($minMax[$criterion->id]),
                    'max' => max($minMax[$criterion->id]),
                ];
            }
        }
    }
}
