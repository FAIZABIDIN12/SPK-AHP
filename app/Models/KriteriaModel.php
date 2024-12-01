<?php
namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kriteria'];

    // Define relationship with SubKriteria
    public function subKriteria()
    {
        return $this->hasMany(SubKriteriaModel::class, 'kriteria_id', 'id');
    }

    // Define relationship with Kos
    public function kos()
    {
        return $this->belongsToMany(KosModel::class, 'kos_kriteria', 'kriteria_id', 'kos_id');
    }
}
