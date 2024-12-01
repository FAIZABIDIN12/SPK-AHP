<?php

namespace App\Controllers;

use App\Models\FasilitasModel;
use App\Models\HargaRangeModel;
use App\Models\JarakRangeModel;

class PerbandinganController extends BaseController
{
    protected $fasilitasModel;
    protected $hargaRangeModel;
    protected $jarakRangeModel;

    public function __construct()
    {
        $this->fasilitasModel = new FasilitasModel();
        $this->hargaRangeModel = new HargaRangeModel();
        $this->jarakRangeModel = new JarakRangeModel();
    }

    public function index()
    {
        // Fetch data from models
        $data['fasilitas'] = $this->fasilitasModel->findAll();
        $data['harga_ranges'] = $this->hargaRangeModel->findAll();
        $data['jarak_ranges'] = $this->jarakRangeModel->findAll();

        // Build the comparison matrices
        // $fasilitasMatrix = $this->buildFasilitasMatrix($data['fasilitas']);
        $hargaMatrix = $this->buildHargaMatrix($data['harga_ranges']);
        $jarakMatrix = $this->buildJarakMatrix($data['jarak_ranges']);

        // Calculate total sums for normalization
        // $fasilitasTotalSums = $this->calculateTotalSums($fasilitasMatrix);
        $hargaTotalSums = $this->calculateTotalSums($hargaMatrix);
        $jarakTotalSums = $this->calculateTotalSums($jarakMatrix);

        // Normalize the matrices and calculate priorities
        // list($normalizedFasilitas, $fasilitasPriorities) = $this->normalizeMatrix($fasilitasMatrix, $fasilitasTotalSums);
        list($normalizedHarga, $hargaPriorities) = $this->normalizeMatrix($hargaMatrix, $hargaTotalSums);
        list($normalizedJarak, $jarakPriorities) = $this->normalizeMatrix($jarakMatrix, $jarakTotalSums);

        // Pass data to the view
        // $data['normalizedFasilitas'] = $normalizedFasilitas;
        // $data['fasilitasPriorities'] = $fasilitasPriorities;
        $data['normalizedHarga'] = $normalizedHarga;
        $data['hargaPriorities'] = $hargaPriorities;
        $data['normalizedJarak'] = $normalizedJarak;
        $data['jarakPriorities'] = $jarakPriorities;

        return view('perbandingan/index', $data);
    }

    private function buildHargaMatrix($hargaRanges)
    {
        $matrix = [];
        // Logika untuk membangun matriks perbandingan harga
        foreach ($hargaRanges as $item) {
            // Logika perbandingan harga
        }
        return $matrix;
    }

    private function buildJarakMatrix($jarakRanges)
    {
        $matrix = [];
        // Logika untuk membangun matriks perbandingan jarak
        foreach ($jarakRanges as $item) {
            // Logika perbandingan jarak
        }
        return $matrix;
    }

    private function calculateTotalSums($matrix)
    {
        $totalSums = [];
        foreach ($matrix as $comparisons) {
            foreach ($comparisons as $criteria2 => $value) {
                if (!isset($totalSums[$criteria2])) {
                    $totalSums[$criteria2] = 0;
                }
                $totalSums[$criteria2] += $value;
            }
        }
        return $totalSums;
    }

    private function normalizeMatrix($matrix, $totalSums)
    {
        $normalizedMatrix = [];
        $priorities = [];
        foreach ($matrix as $criteria1 => $comparisons) {
            $normalizedRow = [];
            foreach ($comparisons as $criteria2 => $value) {
                $normalizedValue = ($totalSums[$criteria2] > 0) ? $value / $totalSums[$criteria2] : 0;
                $normalizedRow[$criteria2] = $normalizedValue;
                $normalizedMatrix[$criteria1][$criteria2] = $normalizedValue;
            }
            $priorities[$criteria1] = array_sum($normalizedRow) / count($normalizedRow);
        }
        return [$normalizedMatrix, $priorities];
    }
}
