<?php

namespace App\Models;

use CodeIgniter\Model;

class CriteriaComparisonModel extends Model
{
    protected $table            = 'criteria_comparisons'; // Nama tabel
    protected $primaryKey       = 'id'; // Kolom primary key
    protected $useAutoIncrement = true; // Auto-increment pada primary key
    protected $returnType       = 'array'; // Tipe data yang dikembalikan
    protected $allowedFields    = ['kos_id', 'criteria1', 'criteria2', 'comparison_value', 'created_at', 'updated_at']; // Kolom yang diizinkan

    // Menggunakan timestamps secara otomatis
    protected $useTimestamps = true; 
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Anda bisa menambahkan aturan validasi jika diperlukan
    protected $validationRules = [
        'kos_id' => 'required|integer',
        'criteria1' => 'required|string',
        'criteria2' => 'required|string',
        'comparison_value' => 'required|numeric',
    ];
}
