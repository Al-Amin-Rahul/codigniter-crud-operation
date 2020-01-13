<?php namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $allowedFields = ['product_name', 'product_code', 'product_price', 'description'];

    
	public function fetchAllItem(){
		$db      			= \Config\Database::connect();
		$builder 			= $db->table('items');
		$query   			= $builder->get();
		$data	= $query->getResult();
		return $data;
    }
    public function fetchEditItem($id){
		$db      			= \Config\Database::connect();
		$builder 			= $db->table('items');
		$query   			= $builder->where('id', $id)->get();
		$data	= $query->getResult();
		return $data;
    }
    
}