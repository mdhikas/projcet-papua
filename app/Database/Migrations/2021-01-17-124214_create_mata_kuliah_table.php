<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMataKuliahTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
      'kode_mk' => ['type' => 'VARCHAR', 'constraint' => 10],
      'nama_mk' => ['type' => 'VARCHAR', 'constraint' => 50],
      'jumlah_sks' => ['type' => 'INT']
    ]);

    $this->forge->addKey('kode_mk', true);
    $this->forge->createTable('mata_kuliah', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
