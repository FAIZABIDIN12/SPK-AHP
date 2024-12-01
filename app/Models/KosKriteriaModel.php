<?php
namespace App\Models;

use CodeIgniter\Model;

class KosKriteriaModel extends Model
{
    protected $table = 'kos_kriteria';
    protected $primaryKey = 'id'; // You may not need a primary key if it's purely a pivot table
    protected $allowedFields = ['kos_id', 'kriteria_id'];
}
