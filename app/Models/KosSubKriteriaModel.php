<?php 
namespace App\Models;

use CodeIgniter\Model;

class KosSubKriteriaModel extends Model
{
    protected $table = 'kos_sub_kriteria';
    protected $primaryKey = 'id'; // You may not need a primary key if it's purely a pivot table
    protected $allowedFields = ['kos_id', 'sub_kriteria_id'];
}
