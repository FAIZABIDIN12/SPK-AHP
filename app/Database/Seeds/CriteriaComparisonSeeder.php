<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CriteriaComparisonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Membandingkan Harga
            ['kos_id' => 1, 'criteria1' => 'Harga', 'criteria2' => 'Harga', 'comparison_value' => 1],
            ['kos_id' => 1, 'criteria1' => 'Harga', 'criteria2' => 'Fasilitas', 'comparison_value' => 3],
            ['kos_id' => 1, 'criteria1' => 'Harga', 'criteria2' => 'Jarak', 'comparison_value' => 5],
            
            // Membandingkan Fasilitas
            ['kos_id' => 1, 'criteria1' => 'Fasilitas', 'criteria2' => 'Harga', 'comparison_value' => 1/3], // 0.33
            ['kos_id' => 1, 'criteria1' => 'Fasilitas', 'criteria2' => 'Fasilitas', 'comparison_value' => 1],
            ['kos_id' => 1, 'criteria1' => 'Fasilitas', 'criteria2' => 'Jarak', 'comparison_value' => 7],
            
            // Membandingkan Jarak
            ['kos_id' => 1, 'criteria1' => 'Jarak', 'criteria2' => 'Harga', 'comparison_value' => 1/5], // 0.20
            ['kos_id' => 1, 'criteria1' => 'Jarak', 'criteria2' => 'Fasilitas', 'comparison_value' => 1/7], // 0.14
            ['kos_id' => 1, 'criteria1' => 'Jarak', 'criteria2' => 'Jarak', 'comparison_value' => 1],
        ];
        

        // Insert data into the criteria_comparisons table
        foreach ($data as $comparison) {
            $this->db->table('criteria_comparisons')->insert($comparison);
        }

        // Optionally, you can use this message for logging purposes
        echo "Criteria comparisons seeded successfully.\n";
    }
}
