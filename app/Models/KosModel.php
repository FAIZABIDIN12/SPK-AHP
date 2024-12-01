<?php 

namespace App\Models;

use CodeIgniter\Model;

class KosModel extends Model
{
    protected $table = 'kos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'description'];

    // Define relationship with Kriteria
    public function kriteria()
    {
        return $this->belongsToMany(KriteriaModel::class, 'kos_kriteria', 'kos_id', 'kriteria_id');
    }

    // Define relationship with SubKriteria
    public function subKriteria()
    {
        return $this->belongsToMany(SubKriteriaModel::class, 'kos_sub_kriteria', 'kos_id', 'sub_kriteria_id');
    }

    public function addKriteriaToKos($kosId, $kriteriaId)
    {
        $data = [
            'kos_id' => $kosId,
            'kriteria_id' => $kriteriaId,
        ];
        return $this->db->table('kos_kriteria')->insert($data);
    }

    public function addSubKriteriaToKos($kosId, $subKriteriaId)
    {
        $data = [
            'kos_id' => $kosId,
            'sub_kriteria_id' => $subKriteriaId,
        ];
        return $this->db->table('kos_sub_kriteria')->insert($data);
    }
}
