<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use CodeIgniter\Controller;

class KriteriaController extends Controller
{
    protected $kriteriaModel;
    protected $subKriteriaModel;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->subKriteriaModel = new SubKriteriaModel();
    }

    public function index()
    {
        // Ambil semua kriteria
        $data['kriterias'] = $this->kriteriaModel->findAll();
        
        // Ambil subkriteria untuk setiap kriteria
        foreach ($data['kriterias'] as &$kriteria) {
            $kriteria['sub_kriterias'] = $this->subKriteriaModel->where('kriteria_id', $kriteria['id'])->findAll(); // Changed to plural
        }
        
        return view('kriteria/index', $data);
    }
    

    public function addKriteria()
    {
        $this->validate([
            'nama_kriteria' => 'required|min_length[3]|max_length[100]',
        ]);

        $this->kriteriaModel->insert([
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
        ]);

        return redirect()->to('/kriteria');
    }

    public function addSubKriteria()
    {
        $this->validate([
            'kriteria_id' => 'required',
            'nama_sub_kriteria' => 'required|min_length[3]|max_length[100]',
        ]);

        $this->subKriteriaModel->insert([
            'kriteria_id' => $this->request->getVar('kriteria_id'),
            'nama_sub_kriteria' => $this->request->getVar('nama_sub_kriteria'),
        ]);

        return redirect()->to('/kriteria');
    }

    public function deleteKriteria($id)
    {
        // First delete all sub kriteria associated with this kriteria
        $this->subKriteriaModel->where('kriteria_id', $id)->delete();
        
        // Now delete the kriteria itself
        $this->kriteriaModel->delete($id);
        
        return redirect()->to('/kriteria')->with('success', 'Kriteria and its sub-kriteria have been deleted successfully.');
    }

    public function deleteSubKriteria($id)
    {
        $this->subKriteriaModel->delete($id);
        return redirect()->to('/kriteria')->with('success', 'Sub Kriteria has been deleted successfully.');
    }

    public function getSubKriteria($id)
    {
        $subKriteria = $this->subKriteriaModel->where('kriteria_id', $id)->findAll();
        return $this->response->setJSON($subKriteria);
    }
    
}
