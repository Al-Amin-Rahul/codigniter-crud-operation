<?php namespace App\Controllers;

class ExampleController extends BaseController
{
	public function addItem()
	{
		$data['body']	=	view('pages/add-item.php');
		return view('master',$data);
	}
	public function createItem()
	{
		helper('form');
		$model = new Item();

		$data[]=array();

		$data([
			'product_name' => $this->request->getVar('product_name'),
			'product_code' => $this->request->getVar('product_code'),
			'product_price' => $this->request->getVar('product_price'),
			'description' => $this->request->getVar('description'),
		]);

		return $data;

		// $data['body']	=	view('pages/add-item.php');
		// return view('master',$data);
	}


	//--------------------------------------------------------------------

}