<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKosDecisionSupportSystem extends Migration
{
    public function up()
    {
        // Tabel kos
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kos');

        // Tabel kriteria
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kriteria');

        // Tabel sub_kriteria
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kriteria_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_sub_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sub_kriteria');

        // Tabel pivot kos_kriteria
        $this->forge->addField([
            'kos_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kriteria_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey(['kos_id', 'kriteria_id']);
        $this->forge->addForeignKey('kos_id', 'kos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kriteria_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kos_kriteria');

        // Tabel pivot kos_sub_kriteria
        $this->forge->addField([
            'kos_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'sub_kriteria_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey(['kos_id', 'sub_kriteria_id']);
        $this->forge->addForeignKey('kos_id', 'kos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sub_kriteria_id', 'sub_kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kos_sub_kriteria');

        // Tabel perbandingan_kriteria
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kriteria_a_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kriteria_b_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nilai' => [
                'type' => 'FLOAT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kriteria_a_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kriteria_b_id', 'kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('perbandingan_kriteria');

        // Tabel perbandingan_sub_kriteria
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'sub_kriteria_a_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'sub_kriteria_b_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nilai' => [
                'type' => 'FLOAT',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('sub_kriteria_a_id', 'sub_kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sub_kriteria_b_id', 'sub_kriteria', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('perbandingan_sub_kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kos_sub_kriteria');
        $this->forge->dropTable('kos_kriteria');
        $this->forge->dropTable('perbandingan_sub_kriteria');
        $this->forge->dropTable('perbandingan_kriteria');
        $this->forge->dropTable('sub_kriteria');
        $this->forge->dropTable('kriteria');
        $this->forge->dropTable('kos');
    }
}
