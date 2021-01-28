<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'nim' => ['type' => 'CHAR', 'constraint' => 9],
      'nama' => ['type' => 'VARCHAR', 'constraint' => 128],
      'tempat_lahir' => ['type' => 'VARCHAR', 'constraint' => 128],
      'tanggal_lahir' => ['type' => 'DATE'],
      'email' => ['type' => 'VARCHAR', 'constraint' => 256],
      'jenis_kelamin' => ['type' => 'ENUM', 'constraint' => ['Laki-Laki', 'Perempuan']],
      'nik' => ['type' => 'CHAR', 'constraint' => 16, 'null' => true],
      'kode_jurusan' => ['type' => 'VARCHAR', 'constraint' => 5],
    ]);
    $this->forge->addKey('nim', true);
    $this->forge->addForeignKey('kode_jurusan', 'jurusan', 'kode_jurusan', 'NO ACTION', 'NO ACTION');
    $this->forge->createTable('mahasiswa', true);
  }

  //--------------------------------------------------------------------

  public function down()
  {
    //
  }
}
