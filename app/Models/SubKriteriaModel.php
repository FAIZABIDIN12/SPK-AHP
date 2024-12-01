<?php 
namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaModel extends Model
{
    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kriteria_id', 'nama_sub_kriteria'];

    // Define relationship with Kriteria
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'id');
    }

    // Define relationship with Kos
    public function kos()
    {
        return $this->belongsToMany(KosModel::class, 'kos_sub_kriteria', 'sub_kriteria_id', 'kos_id');
    }
}
