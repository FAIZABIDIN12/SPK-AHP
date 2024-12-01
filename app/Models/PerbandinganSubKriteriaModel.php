<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbandinganSubKriteriaModel extends Model
{
    protected $table = 'perbandingan_sub_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sub_kriteria_a_id', 'sub_kriteria_b_id', 'nilai'];
    
    public function subKriteriaA()
    {
        return $this->belongsTo(SubKriteriaModel::class, 'sub_kriteria_a_id');
    }

    public function subKriteriaB()
    {
        return $this->belongsTo(SubKriteriaModel::class, 'sub_kriteria_b_id');
    }
}
