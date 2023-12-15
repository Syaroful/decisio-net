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
        // Ambil data dari model Alternative
        $alternatives = Alternative::all();

        // Ambil data dari model Criteria
        $criterias = Criteria::all();

        // Buat matriks keputusan
        $x = $this->makeMatrixDecision($alternatives, $criterias);

        // Buat matriks normalisasi
        $r = $this->makeMatrixNormalization($x);

        // Buat matriks normalisasi terbobot
        $y = $this->makeMatrixNormalizationWeighted($r, $criterias);

        // Perhitungan solusi ideal
        $a = $this->calculateIdealSolution($y);

        // Perhitungan jarak solusi ideal
        $d = $this->calculateDistanceIdealSolution($a, $y);

        // Perhitungan nilai preferensi
        $v = $this->calculatePreferenceValue($d);

        // Perangkingan
        $ranking = $this->calculateRanking($v);

        // Kembalikan variabel dari setiap proses
        return view('topsis', compact('alternatives', 'criterias', 'x', 'r', 'y'));
    }
    private function makeMatrixDecision($alternatives, $criterias)
    {
        // Buat matriks kosong
        $x = [];

        // Looping untuk setiap alternatif
        foreach ($alternatives as $alternative) {
            // Buat baris baru
            $row = [];

            // Looping untuk setiap kriteria
            foreach ($criterias as $criteria) {
                // Ambil nilai dari tabel values
                $value = Value::where('alternative_id', $alternative->id)->where('criteria_id', $criteria->id)->first();

                // Tambahkan nilai ke baris
                $row[] = $value->score;
            }

            // Tambahkan baris ke matriks
            $x[] = $row;
        }

        return $x;
    }

    private function makeMatrixNormalization($x)
    {
        // Buat matriks kosong
        $r = [];

        // Looping untuk setiap baris
        foreach ($x as $row) {
            // Hitung nilai maksimum dan minimum untuk setiap kolom
            $max = max($row);
            $min = min($row);

            // Looping untuk setiap nilai
            foreach ($row as $index => $value) {
                // Hitung nilai normalisasi
                $r[$index][] = ($value - $min) / ($max - $min);
            }
        }

        return $r;
    }

    private function makeMatrixNormalizationWeighted($r, $criterias)
    {
        // Buat matriks kosong
        $y = [];

        // Looping untuk setiap kolom Kriteria
        foreach ($criterias as $index => $criteria) {
            // Looping untuk setiap baris Alternatif
            foreach ($r[$index] as $rowIndex => $rowValue) {
                // Hitung nilai normalisasi terbobot
                $y[$rowIndex][$index] = $rowValue * $criteria->weight;
            }
        }

        return $y;
    }
    private function calculateIdealSolution($y)
    {
        // Buat matriks solusi ideal
        $a = [];

        // Looping untuk setiap kolom
        foreach ($y[0] as $value) {
            // Tentukan nilai solusi ideal
            if ($value > 0) {
                $a[] = $value;
            } else {
                $a[] = -$value;
            }
        }

        return $a;
    }
    private function calculateDistanceIdealSolution($a, $y)
    {
        // Buat matriks jarak solusi ideal
        $d = [];

        // Looping untuk setiap alternatif
        foreach ($y as $row) {
            // Hitung jarak solusi ideal untuk setiap alternatif
            $sum = 0;
            // Looping untuk setiap nilai
            foreach ($row as $index => $value) {
                // Hitung jarak
                if ($value > 0) {
                    $sum += abs($value - $a[$index]);
                } else {
                    $sum += abs($a[$index] - $value);
                }
            }

            // Tambahkan jarak ke matriks
            $d[] = $sum;
        }

        return $d;
    }
    private function calculatePreferenceValue($d)
    {
        // Buat matriks nilai preferensi
        $v = [];

        // Looping untuk setiap alternatif
        foreach ($d as $index => $distance) {
            // Hitung nilai preferensi
            $v[$index] = 1 / $distance;
        }

        return $v;
    }

    private function calculateRanking($v)
    {
        // Buat matriks peringkat
        $ranking = [];

        // Looping untuk setiap alternatif
        foreach ($v as $index => $value) {
            // Tambahkan peringkat
            $ranking[] = $index + 1;
        }

        return $ranking;
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
    public function backup()
    {
        // Ambil data dari model Alternative, Criteria, dan Value
        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        $values = Value::all();

        // Buat matriks keputusan (X)
        $x = [];
        foreach ($criterias as $criteria) {
            $row = [];
            foreach ($alternatives as $alternative) {
                $value = $values->where('alternative_id', $alternative->id)->where('criteria_id', $criteria->id)->first();
                $row[] = $value->score;
            }
            $x[] = $row;
        }

        // Buat matriks normalisasi (R)
        $r = [];
        for ($i = 0; $i < count($alternatives); $i++) {
            $row = [];
            for ($j = 0; $j < count($criterias); $j++) {
                $max = max($x[$i]);
                $min = min($x[$i]);
                $r[$i][$j] = ($x[$i][$j] - $min) / ($max - $min);
            }
            $r[] = $row;
        }

        // Buat matriks normalisasi terbobot (Y)
        $y = [];
        for ($i = 0; $i < count($alternatives); $i++) {
            $row = [];
            for ($j = 0; $j < count($criterias); $j++) {
                $row[] = $r[$i][$j] * $criterias[$j]->weight;
            }
            $y[] = $row;
        }

        // Perhitungan solusi ideal (A)
        $a_pos = [];
        for ($j = 0; $j < count($criterias); $j++) {
            $max = $criterias[$j]->type == 'benefit' ? max($y)[$j] : min($y)[$j];
            $a_pos[] = $max;
        }

        // Perhitungan jarak solusi ideal (D)
        $d_pos = [];
        for ($i = 0; $i < count($alternatives); $i++) {
            $sum = 0;
            for ($j = 0; $j < count($criterias); $j++) {
                $sum += pow($y[$i][$j] - $a_pos[$j], 2);
            }
            $d_pos[] = sqrt($sum);
        }

        // Perhitungan nilai preferensi (V)
        $v = [];
        for ($i = 0; $i < count($alternatives); $i++) {
            $v[] = $d_pos[0] / ($d_pos[0] + $d_pos[$i]);
        }

        // Perangkingan
        $ranking = array_keys($v);
        sort($ranking, SORT_NUMERIC);

        // Kembalikan variabel dari setiap proses
        return view('topsis', compact('alternatives', 'criterias', 'values', 'x', 'r', 'y', 'a_pos', 'd_pos', 'v', 'ranking'));
    }
}
