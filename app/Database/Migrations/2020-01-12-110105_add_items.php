<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddItems extends Migration
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
			'product_name'          => [
					'type'           => 'VARCHAR',
					'constraint'     => 100,
			],
			'product_code'       => [
					'type'           => 'VARCHAR',
					'constraint'     =>  100,
			],
			'product_price' => [
					'type'           => 'INT',
					'constraint'     => 100,
			],
			'description' => [
					'type'           => 'TEXT',
					'constraint'     =>  300,
			],
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->createTable('items');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('items');
	}
}
