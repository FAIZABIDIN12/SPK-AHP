<?php

namespace App\Controllers;

use App\Models\CriteriaComparisonModel;

class CriteriaComparisonController extends BaseController
{
    protected $criteriaComparisonModel;

    public function __construct()
    {
        $this->criteriaComparisonModel = new CriteriaComparisonModel();
    }

    public function index()
    {
        // Fetch comparisons from the model
        $data['comparisons'] = $this->criteriaComparisonModel->findAll();

        // Build the criteria comparison matrix
        $criteriaMatrix = $this->buildCriteriaMatrix($data['comparisons']);

        // Calculate total sums for normalization
        $totalSums = $this->calculateTotalSums($criteriaMatrix);

        // Normalize the matrix and calculate priorities
        list($normalizedMatrix, $priorities) = $this->normalizeMatrix($criteriaMatrix, $totalSums);

        // Calculate eigenvalues
        $eigenValues = $this->calculateEigenValues($priorities, $totalSums);

        // Calculate lambda max and consistency index
        list($lambdaMax, $ci, $cr) = $this->calculateConsistency($eigenValues);

        // Pass data to the view
        $data['normalizedMatrix'] = $normalizedMatrix;
        $data['priorities'] = $priorities;
        $data['eigenValues'] = $eigenValues;
        $data['lambdaMax'] = $lambdaMax;
        $data['ci'] = $ci;
        $data['cr'] = $cr;
        $data['criteriaMatrix'] = $criteriaMatrix; // Pass the criteria matrix to the view

        return view('criteria_comparison/index', $data);
    }

    private function buildCriteriaMatrix($comparisons)
    {
        $criteriaMatrix = [];
        foreach ($comparisons as $comparison) {
            $criteriaMatrix[$comparison['criteria1']][$comparison['criteria2']] = $comparison['comparison_value'];
        }
        return $criteriaMatrix;
    }

    private function calculateTotalSums($criteriaMatrix)
    {
        $totalSums = [];
        foreach ($criteriaMatrix as $comparisons) {
            foreach ($comparisons as $criteria2 => $value) { // Corrected this line
                if (!isset($totalSums[$criteria2])) {
                    $totalSums[$criteria2] = 0;
                }
                $totalSums[$criteria2] += $value;
            }
        }
        return $totalSums;
    }

    private function normalizeMatrix($criteriaMatrix, $totalSums)
    {
        $normalizedMatrix = [];
        $priorities = [];
        foreach ($criteriaMatrix as $criteria1 => $comparisons) {
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

    private function calculateEigenValues($priorities, $totalSums)
    {
        $eigenValues = [];
        foreach ($priorities as $criteria1 => $priority) {
            $totalSum = $totalSums[$criteria1]; // Ambil total sum untuk kriteria tersebut
            $eigenValues[$criteria1] = $priority * $totalSum; // Hitung eigenvalue
        }
        return $eigenValues;
    }

    private function calculateConsistency($eigenValues)
    {
        $totalEigenValues = array_sum($eigenValues);
        $n = count($eigenValues); // Jumlah kriteria
        $lambdaMax = $totalEigenValues; // Total dari nilai eigen
        $ci = ($lambdaMax - $n) / ($n - 1); // CI
        $ri = 0.58; // Menggunakan 0,58 untuk 3 kriteria
        $cr = ($ri > 0) ? $ci / $ri : 0; // CR
        return [$lambdaMax, $ci, $cr];
    }
}
