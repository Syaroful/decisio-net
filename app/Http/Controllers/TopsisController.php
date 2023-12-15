<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Value;

class TopsisController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $alternatives = Alternative::all();
        $values = Value::all();

        $matrik_keputusan = $this->buatMatriksKeputusan($criterias, $alternatives, $values);
        $matrik_normalisasi = $this->buatMatriksNormalisasi($matrik_keputusan);
        $matrik_normalisasi_terbobot = $this->buatMatriksNormalisasiTerbobot($matrik_normalisasi, $criterias);

        $solusi_ideal_positif = $this->hitungSolusiIdealPositif($matrik_normalisasi_terbobot);
        $solusi_ideal_negatif = $this->hitungSolusiIdealNegatif($matrik_normalisasi_terbobot);

        $jarak_solusi_ideal_positif = $this->hitungJarakSolusiIdealPositif($matrik_normalisasi_terbobot, $solusi_ideal_positif);
        $jarak_solusi_ideal_negatif = $this->hitungJarakSolusiIdealNegatif($matrik_normalisasi_terbobot, $solusi_ideal_negatif);

        $nilai_preferensi = $this->hitungNilaiPreferensi($jarak_solusi_ideal_positif, $jarak_solusi_ideal_negatif);

        $ranking = $this->hitungRanking($nilai_preferensi);

        return view('dashboard.calculation', compact('criterias', 'alternatives', 'values', 'matrik_keputusan', 'matrik_normalisasi', 'matrik_normalisasi_terbobot', 'solusi_ideal_positif', 'solusi_ideal_negatif', 'jarak_solusi_ideal_positif', 'jarak_solusi_ideal_negatif', 'nilai_preferensi', 'ranking'));
    }

    private function buatMatriksKeputusan($criterias, $alternatives, $values)
    {
        $matrik_keputusan = [];
        for ($i = 0; $i < count($criterias); $i++) {
            $matrik_keputusan[$i] = [];
            for ($j = 0; $j < count($alternatives); $j++) {
                $matrik_keputusan[$i][$j] = $values->where('criteria_id', $i + 1)->where('alternative_id', $j + 1)->first()->score;
            }
        }
        return $matrik_keputusan;
    }

    private function buatMatriksNormalisasi($matrik_keputusan)
    {
        $matrik_normalisasi = [];
        for ($i = 0; $i < count($matrik_keputusan); $i++) {
            $matrik_normalisasi[$i] = [];
            for ($j = 0; $j < count($matrik_keputusan[0]); $j++) {
                $max = max($matrik_keputusan[$i]);
                $min = min($matrik_keputusan[$i]);
                if ($min != $max) {
                    $matrik_normalisasi[$i][$j] = ($matrik_keputusan[$i][$j] - $min) / ($max - $min);
                } else {
                    $matrik_normalisasi[$i][$j] = 1;
                }
            }
        }
        return $matrik_normalisasi;
    }

    private function buatMatriksNormalisasiTerbobot($matrik_normalisasi, $alternatives)
    {
        $matrik_normalisasi_terbobot = [];
        for ($i = 0; $i < count($alternatives); $i++) {
            $matrik_normalisasi_terbobot[$i] = [];
            for ($j = 0; $j < count($matrik_normalisasi[0]); $j++) {
                $matrik_normalisasi_terbobot[$i][$j] = $matrik_normalisasi[$i][$j] * $alternatives[$i]->weight;
            }
        }
        return $matrik_normalisasi_terbobot;
    }

    private function hitungSolusiIdealPositif($matrik_normalisasi_terbobot)
    {
        $solusi_ideal_positif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot[0]); $i++) {
            $max = max($matrik_normalisasi_terbobot);
            $solusi_ideal_positif[$i] = $max[$i];
        }
        return $solusi_ideal_positif;
    }

    private function hitungSolusiIdealNegatif($matrik_normalisasi_terbobot)
    {
        $solusi_ideal_negatif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot[0]); $i++) {
            $min = min($matrik_normalisasi_terbobot);
            $solusi_ideal_negatif[$i] = $min[$i];
        }
        return $solusi_ideal_negatif;
    }

    private function hitungJarakSolusiIdealPositif($matrik_normalisasi_terbobot, $solusi_ideal_positif)
    {
        $jarak_solusi_ideal_positif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot); $i++) {
            $jarak = 0;
            for ($j = 0; $j < count($matrik_normalisasi_terbobot[0]); $j++) {
                $jarak += pow($matrik_normalisasi_terbobot[$i][$j] - $solusi_ideal_positif[$j], 2);
            }
            $jarak_solusi_ideal_positif[$i] = sqrt($jarak);
        }
        return $jarak_solusi_ideal_positif;
    }

    private function hitungJarakSolusiIdealNegatif($matrik_normalisasi_terbobot, $solusi_ideal_negatif)
    {
        $jarak_solusi_ideal_negatif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot); $i++) {
            $jarak = 0;
            for ($j = 0; $j < count($matrik_normalisasi_terbobot[0]); $j++) {
                $jarak += pow($matrik_normalisasi_terbobot[$i][$j] - $solusi_ideal_negatif[$j], 2);
            }
            $jarak_solusi_ideal_negatif[$i] = sqrt($jarak);
        }
        return $jarak_solusi_ideal_negatif;
    }

    private function hitungNilaiPreferensi($jarak_solusi_ideal_positif, $jarak_solusi_ideal_negatif)
    {
        $nilai_preferensi = [];
        for ($i = 0; $i < count($jarak_solusi_ideal_positif); $i++) {
            $nilai_preferensi[$i] = $jarak_solusi_ideal_negatif[$i] / ($jarak_solusi_ideal_positif[$i] + $jarak_solusi_ideal_negatif[$i]);
        }
        return $nilai_preferensi;
    }

    private function hitungRanking($nilai_preferensi)
    {
        $ranking = array_keys($nilai_preferensi);
        rsort($ranking);
        return $ranking;
    }
}
