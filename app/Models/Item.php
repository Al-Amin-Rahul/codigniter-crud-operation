<?php namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $allowedFields = ['product_name', 'product_code', 'product_price', 'description'];

    public function addItem($data){
		$sql	=	"INSERT INTO `items` (`product_name`, `product_code`, `product_price`, `description`) VALUES ($product_name, $product_code, $product_price, $description)";
		$query	=	Database::connect()->query($sql);
		$data	= $query->getResult();
		return;
	}
	public function fetchAllItem(){
		$sql	=	"SELECT * FROM `items` ORDER BY id DESC";
		$query	=	Database::connect()->query($sql);
		$data	= $query->getResult();
		return $data;
    }
    public function fetchEditItem($id){
		$sql	=	"SELECT * FROM `items` WHERE `id` = $id";
		$query	=	Database::connect()->query($sql);
		$data	= $query->getResult();
		return $data;
	}
	
	public function deleteItem($id){
		$sql	=	"DELETE FROM `items` WHERE `id` = $id";
		Database::connect()->query($sql);
		return;
	}
    
}