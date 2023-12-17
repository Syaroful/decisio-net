<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Value;
use RealRashid\SweetAlert\Facades\Alert;

class TopsisController extends Controller
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
            Alert::error("Error", "Data penilaian belum diisi!");
            return redirect()->route('values.index');

        }
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
        $cek = count($ranking);

        return view('dashboard.calculation', compact(
            'criterias',
            'alternatives',
            'values',
            'matrik_keputusan',
            'matrik_normalisasi',
            'matrik_normalisasi_terbobot',
            'solusi_ideal_positif',
            'solusi_ideal_negatif',
            'jarak_solusi_ideal_positif',
            'jarak_solusi_ideal_negatif',
            'nilai_preferensi',
            'ranking'
        ));
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
                $jumlah_kuadrat = 0;
                for ($k = 0; $k < count($matrik_keputusan[$i]); $k++) {
                    $jumlah_kuadrat += pow($matrik_keputusan[$i][$k], 2);
                }
                $matrik_normalisasi[$i][$j] = round($matrik_keputusan[$i][$j] / sqrt($jumlah_kuadrat), 3);
            }
        }
        return $matrik_normalisasi;
    }

    private function buatMatriksNormalisasiTerbobot($matrik_normalisasi, $criterias)
    {
        $matrik_normalisasi_terbobot = [];
        for ($i = 0; $i < count($criterias); $i++) {
            $matrik_normalisasi_terbobot[$i] = [];
            for ($j = 0; $j < count($matrik_normalisasi[$i]); $j++) {
                $matrik_normalisasi_terbobot[$i][$j] = $matrik_normalisasi[$i][$j] * $criterias[$i]->weight;
            }
        }
        return $matrik_normalisasi_terbobot;

    }

    private function hitungSolusiIdealPositif($matrik_normalisasi_terbobot)
    {

        $type = Criteria::pluck('type')->toArray();
        $solusi_ideal_positif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot); $i++) {
            for ($j = 0; $j < count($matrik_normalisasi_terbobot[$i]); $j++) {
                $max = max($matrik_normalisasi_terbobot[$i]);
                $min = min($matrik_normalisasi_terbobot[$i]);
                if ($type[$i] == 'benefit') {
                    $solusi_ideal_positif[$i] = $max;
                } else {
                    $solusi_ideal_positif[$i] = $min;
                }

            }
        }
        return $solusi_ideal_positif;
    }

    private function hitungSolusiIdealNegatif($matrik_normalisasi_terbobot)
    {
        $type = Criteria::pluck('type')->toArray();
        $solusi_ideal_negatif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot); $i++) {
            for ($j = 0; $j < count($matrik_normalisasi_terbobot[$i]); $j++) {
                $max = max($matrik_normalisasi_terbobot[$i]);
                $min = min($matrik_normalisasi_terbobot[$i]);
                if ($type[$i] == 'benefit') {
                    $solusi_ideal_negatif[$i] = $min;
                } else {
                    $solusi_ideal_negatif[$i] = $max;
                }

            }
        }
        return $solusi_ideal_negatif;
    }

    private function hitungJarakSolusiIdealPositif($matrik_normalisasi_terbobot, $solusi_ideal_positif)
    {
        $jarak_solusi_ideal_negatif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot[0]); $i++) {
            $jarak = 0;

            for ($j = 0; $j < count($matrik_normalisasi_terbobot); $j++) {
                $jarak += pow(($solusi_ideal_positif[$j] - $matrik_normalisasi_terbobot[$j][$i]), 2);
            }
            $jarak_solusi_ideal_negatif[$i] = round(sqrt($jarak), 3);

        }
        return $jarak_solusi_ideal_negatif;
    }

    private function hitungJarakSolusiIdealNegatif($matrik_normalisasi_terbobot, $solusi_ideal_negatif)
    {
        $jarak_solusi_ideal_negatif = [];
        for ($i = 0; $i < count($matrik_normalisasi_terbobot[0]); $i++) {
            $jarak = 0;

            for ($j = 0; $j < count($matrik_normalisasi_terbobot); $j++) {
                $jarak += pow(($solusi_ideal_negatif[$j] - $matrik_normalisasi_terbobot[$j][$i]), 2);
            }
            $jarak_solusi_ideal_negatif[$i] = round(sqrt($jarak), 3);

        }
        return $jarak_solusi_ideal_negatif;
    }

    private function hitungNilaiPreferensi($jarak_solusi_ideal_positif, $jarak_solusi_ideal_negatif)
    {
        $nilai_preferensi = [];
        for ($i = 0; $i < count($jarak_solusi_ideal_positif); $i++) {
            $nilai_preferensi[$i] = round($jarak_solusi_ideal_negatif[$i] / ($jarak_solusi_ideal_positif[$i] + $jarak_solusi_ideal_negatif[$i]), 3);
        }
        return $nilai_preferensi;
    }

    private function hitungRanking($nilai_preferensi)
    {

        // Sort rankings in descending order
        arsort($nilai_preferensi);

        // Assign new rankings
        $ranking = [];
        $rankingValue = 1;
        foreach ($nilai_preferensi as $alternatifId => $totalRanking) {
            $ranking[$alternatifId] = $rankingValue;
            $rankingValue++;
        }
        return $ranking;
    }

}
