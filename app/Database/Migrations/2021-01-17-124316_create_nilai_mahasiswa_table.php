<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilaiMahasiswaTable extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'nilai_id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
      'nim' => ['type' => 'CHAR', 'cosntraint' => 9],
      'kode_mk' => ['type' => 'VARCHAR', 'constraint' => 10],
      'nilai' => ['type' => 'FLOAT'],
      'semester' => ['type' => 'VARCHAR', 'constraint' => 5]
    ]);

    $this->forge->addKey('nilai_id', true);
    $this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'NO ACTION', 'NO ACTION');
    $this->forge->addForeignKey('kode_mk', 'mata_kuliah', 'kode_mk', 'NO ACTION', 'NO ACTION');
    $this->forge->createTable('nilai_mahasiswa', true);
  }

  //--------------------------------------------------------------------

  public function down()
  {
    //
  }
}
