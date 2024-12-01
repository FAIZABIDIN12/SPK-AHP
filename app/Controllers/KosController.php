<?php

namespace App\Controllers;

use App\Models\KosModel;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use CodeIgniter\Controller;

class KosController extends Controller
{
    protected $kosModel;
    protected $kriteriaModel;
    protected $subKriteriaModel;

    public function __construct()
    {
        $this->kosModel = new KosModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subKriteriaModel = new SubKriteriaModel();
    }

    public function index()
    {
        // Fetch all kos data
        $data['kosList'] = $this->kosModel->findAll();

        // Fetch all kriteria with their sub-kriteria
        $data['kriteriaList'] = $this->kriteriaModel->findAll();
        foreach ($data['kriteriaList'] as &$kriteria) {
            $kriteria['sub_kriteria'] = $this->subKriteriaModel->where('kriteria_id', $kriteria['id'])->findAll();
        }

        return view('kos/index', $data);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min_length[3]|max_length[100]',
            'address' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[3]',
            'sub_kriteria' => 'required',
        ]);

        // Save kos data
        $kosId = $this->kosModel->insert([
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'description' => $this->request->getVar('description'),
        ]);

        // Save sub-kriteria data associated with this kos
        $subKriteriaIds = $this->request->getVar('sub_kriteria');
        foreach ($subKriteriaIds as $subKriteriaId) {
            $this->kosModel->insertSubKriteria($kosId, $subKriteriaId);
        }

        return redirect()->to('/kos')->with('success', 'Data Kos berhasil ditambahkan.');
    }
}
