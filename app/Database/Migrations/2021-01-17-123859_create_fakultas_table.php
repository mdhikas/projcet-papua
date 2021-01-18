<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFakultasTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
      'kode_fakultas' => ['type' => 'VARCHAR', 'constraint' => 5],
      'nama_fakultas' => ['type' => 'VARCHAR', 'constraint' => 128]
    ]);

    $this->forge->addKey('kode_fakultas', true);
    $this->forge->createTable('fakultas');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
