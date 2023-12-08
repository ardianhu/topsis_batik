<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class TopsisController extends Controller
{
    //
    public function index()
    {
        $data = Criteria::all();
        return view('dashboard', compact('data'));
    }
    public function upload(Request $request)
    {
        $warna = $request->warna;
        $jenis_kain = $request->jenis_kain;
        $harga = $request->harga;
        $userInput = [$warna, $jenis_kain, $harga];

        $criteriaModel = Criteria::all();
        $firstValue = [];
        // dd($criteriaModel[0]);

        // Loop through a range of values for 'A'
        for ($i = 1; $i <= 6; $i++) { // Assuming you want A01 to A06
            // Generate a variable name like A01C1, A01C2, ...
            $variableName = 'A' . sprintf('%02d', $i);

            // Check each criteria independently
            $matchingModel = $criteriaModel[$i - 1]; // Assuming $i is a valid index

            // Assign a value based on the match
            $firstValue[$variableName . 'C1'] = ($matchingModel->warna == $userInput[0]) ? 2 : 1;
            $firstValue[$variableName . 'C2'] = ($matchingModel->jenis_kain == $userInput[1]) ? 2 : 1;
            $firstValue[$variableName . 'C3'] = ($matchingModel->harga == $userInput[2]) ? 2 : 1;
        }
        $x1 = sqrt($firstValue['A01C1'] ** 2 + $firstValue['A02C1'] ** 2 + $firstValue['A03C1'] ** 2 + $firstValue['A04C1'] ** 2 + $firstValue['A05C1'] ** 2 + $firstValue['A06C1'] ** 2);
        $r11 = $firstValue['A01C1'] / $x1;
        $r12 = $firstValue['A02C1'] / $x1;
        $r13 = $firstValue['A03C1'] / $x1;
        $r14 = $firstValue['A04C1'] / $x1;
        $r15 = $firstValue['A05C1'] / $x1;
        $r16 = $firstValue['A06C1'] / $x1;
        $x2 = sqrt($firstValue['A01C2'] ** 2 + $firstValue['A02C2'] ** 2 + $firstValue['A03C2'] ** 2 + $firstValue['A04C2'] ** 2 + $firstValue['A05C2'] ** 2 + $firstValue['A06C2'] ** 2);
        $r21 = $firstValue['A01C2'] / $x2;
        $r22 = $firstValue['A02C2'] / $x2;
        $r23 = $firstValue['A03C2'] / $x2;
        $r24 = $firstValue['A04C2'] / $x2;
        $r25 = $firstValue['A05C2'] / $x2;
        $r26 = $firstValue['A06C2'] / $x2;
        $x3 = sqrt($firstValue['A01C3'] ** 2 + $firstValue['A02C3'] ** 2 + $firstValue['A03C3'] ** 2 + $firstValue['A04C3'] ** 2 + $firstValue['A05C3'] ** 2 + $firstValue['A06C3'] ** 2);
        $r31 = $firstValue['A01C3'] / $x3;
        $r32 = $firstValue['A02C3'] / $x3;
        $r33 = $firstValue['A03C3'] / $x3;
        $r34 = $firstValue['A04C3'] / $x3;
        $r35 = $firstValue['A05C3'] / $x3;
        $r36 = $firstValue['A06C3'] / $x3;
        // dd($x1, $x2, $x1, $r12);

        $bobotWarna = 0.35;
        $bobotJenisKain = 0.25;
        $bobotHarga = 0.40;
        
        $y = [];

        $y['1k1'] = $r11 * $bobotWarna;
        $y['1k2'] = $r21 * $bobotJenisKain;
        $y['1k3'] = $r31 * $bobotHarga;
        $y['2k1'] = $r12 * $bobotWarna;
        $y['2k2'] = $r22 * $bobotJenisKain;
        $y['2k3'] = $r32 * $bobotHarga;
        $y['3k1'] = $r13 * $bobotWarna;
        $y['3k2'] = $r23 * $bobotJenisKain;
        $y['3k3'] = $r33 * $bobotHarga;
        $y['4k1'] = $r14 * $bobotWarna;
        $y['4k2'] = $r24 * $bobotJenisKain;
        $y['4k3'] = $r34 * $bobotHarga;
        $y['5k1'] = $r15 * $bobotWarna;
        $y['5k2'] = $r25 * $bobotJenisKain;
        $y['5k3'] = $r35 * $bobotHarga;
        $y['6k1'] = $r16 * $bobotWarna;
        $y['6k2'] = $r26 * $bobotJenisKain;
        $y['6k3'] = $r36 * $bobotHarga;

        $listWarna = [];
        $listJenisKain = [];
        $listHarga = [];

        $listWarna[0] = $y['1k1'];
        $listWarna[1] = $y['2k1'];
        $listWarna[2] = $y['3k1'];
        $listWarna[3] = $y['4k1'];
        $listWarna[4] = $y['5k1'];
        $listWarna[5] = $y['6k1'];

        $listJenisKain[0] = $y['1k2'];
        $listJenisKain[1] = $y['2k2'];
        $listJenisKain[2] = $y['3k2'];
        $listJenisKain[3] = $y['4k2'];
        $listJenisKain[4] = $y['5k2'];
        $listJenisKain[5] = $y['6k2'];

        $listHarga[0] = $y['1k3'];
        $listHarga[1] = $y['2k3'];
        $listHarga[2] = $y['3k3'];
        $listHarga[3] = $y['4k3'];
        $listHarga[4] = $y['5k3'];
        $listHarga[5] = $y['6k3'];

        $maxWarna = max($listWarna);
        $maxJenisKain = max($listJenisKain);
        $maxHarga = max($listHarga);

        $minWarna = min($listWarna);
        $minJenisKain = min($listJenisKain);
        $minHarga = min($listHarga);

        $dPlusResult = [];
        $dMinusResult = [];

        $dPlusResult[0] = sqrt(($y['1k1'] - $maxWarna) ** 2 + ($y['1k2'] - $maxJenisKain) ** 2 + ($y['1k3'] - $maxHarga) ** 2);
        $dPlusResult[1] = sqrt(($y['2k1'] - $maxWarna) ** 2 + ($y['2k2'] - $maxJenisKain) ** 2 + ($y['2k3'] - $maxHarga) ** 2);
        $dPlusResult[2] = sqrt(($y['3k1'] - $maxWarna) ** 2 + ($y['3k2'] - $maxJenisKain) ** 2 + ($y['3k3'] - $maxHarga) ** 2);
        $dPlusResult[3] = sqrt(($y['4k1'] - $maxWarna) ** 2 + ($y['4k2'] - $maxJenisKain) ** 2 + ($y['4k3'] - $maxHarga) ** 2);
        $dPlusResult[4] = sqrt(($y['5k1'] - $maxWarna) ** 2 + ($y['5k2'] - $maxJenisKain) ** 2 + ($y['5k3'] - $maxHarga) ** 2);
        $dPlusResult[5] = sqrt(($y['6k1'] - $maxWarna) ** 2 + ($y['6k2'] - $maxJenisKain) ** 2 + ($y['6k3'] - $maxHarga) ** 2);

        $dMinusResult[0] = sqrt(($y['1k1'] - $minWarna) ** 2 + ($y['1k2'] - $minJenisKain) ** 2 + ($y['1k3'] - $minHarga) ** 2);
        $dMinusResult[1] = sqrt(($y['2k1'] - $minWarna) ** 2 + ($y['2k2'] - $minJenisKain) ** 2 + ($y['2k3'] - $minHarga) ** 2);
        $dMinusResult[2] = sqrt(($y['3k1'] - $minWarna) ** 2 + ($y['3k2'] - $minJenisKain) ** 2 + ($y['3k3'] - $minHarga) ** 2);
        $dMinusResult[3] = sqrt(($y['4k1'] - $minWarna) ** 2 + ($y['4k2'] - $minJenisKain) ** 2 + ($y['4k3'] - $minHarga) ** 2);
        $dMinusResult[4] = sqrt(($y['5k1'] - $minWarna) ** 2 + ($y['5k2'] - $minJenisKain) ** 2 + ($y['5k3'] - $minHarga) ** 2);
        $dMinusResult[5] = sqrt(($y['6k1'] - $minWarna) ** 2 + ($y['6k2'] - $minJenisKain) ** 2 + ($y['6k3'] - $minHarga) ** 2);


        $vResult = [];

        $vResult[0] = $dMinusResult[0] / ($dMinusResult[0] + $dPlusResult[0]);
        $vResult[1] = $dMinusResult[1] / ($dMinusResult[1] + $dPlusResult[1]);
        $vResult[2] = $dMinusResult[2] / ($dMinusResult[2] + $dPlusResult[2]);
        $vResult[3] = $dMinusResult[3] / ($dMinusResult[3] + $dPlusResult[3]);
        $vResult[4] = $dMinusResult[4] / ($dMinusResult[4] + $dPlusResult[4]);
        $vResult[5] = $dMinusResult[5] / ($dMinusResult[5] + $dPlusResult[5]);

        $maxV = max($vResult);
        // $maxValue = max($numbers);
        $indexmax = array_keys($vResult, $maxV);

        $data = $criteriaModel[$indexmax[0]];

        return view('rekomendasi', $data);
        // dd($criteriaModel[$indexmax[0]]);

    }
}
