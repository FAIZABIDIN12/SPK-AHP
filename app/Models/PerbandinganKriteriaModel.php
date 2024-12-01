<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbandinganKriteriaModel extends Model
{
    protected $table = 'perbandingan_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kriteria_a_id', 'kriteria_b_id', 'nilai'];
    
    public function kriteriaA()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_a_id');
    }

    public function kriteriaB()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_b_id');
    }
}
