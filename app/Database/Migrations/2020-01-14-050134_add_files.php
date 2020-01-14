<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFiles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'file_name'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 100,
			],
			'file'       => [
					'type'           => 'TEXT',
					'constraint'     =>  100,
			],
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->createTable('files');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('files');
	}
}
