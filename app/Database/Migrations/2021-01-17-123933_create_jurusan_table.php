<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJurusanTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
      'kode_jurusan' => ['type' => 'VARCHAR', 'constraint' => 5],
      'jenjang' => ['type' => 'VARCHAR', 'constraint' => 2],
      'nama_jurusan' => ['type' => 'VARCHAR', 'constraint' => 128],
      'kode_fakultas' => ['type' => 'VARCHAR', 'constraint' => 5]
    ]);

    $this->forge->addKey('kode_jurusan', true);
    $this->forge->addForeignKey('kode_fakultas', 'fakultas', 'kode_fakultas', 'NO ACTION', 'NO ACTION');
    $this->forge->createTable('jurusan', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
