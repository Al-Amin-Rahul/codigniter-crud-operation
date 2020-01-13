<?php namespace App\Controllers;
use App\Models\Item;
use Config\Database;
use App\Controllers\BaseController;

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
		if (! $this->validate([
			'product_name'   => 'required',
			'product_code'   => 'required',
			'product_price'  => 'required',
			'description'    => 'required',
		],
		[   // Errors
			'product_name' => [
				'required' => 'All accounts must have usernames',
			],
			'product_code' => [
				'required' => 'Your password is too short. You want to get hacked?'
			]
		]
		
		))
		{
			$data['body']	=	view('pages/add-item.php');
			return view('master',$data);
		}
		else
		{
			$model->save([
				'product_name'   => $this->request->getVar('product_name'),
				'product_code'   => $this->request->getVar('product_code'),
				'product_price'  => $this->request->getVar('product_price'),
				'description'    => $this->request->getVar('description'),
			]);
			$data['results'] = $model->fetchAllItem();
			$data['body'] = view('pages/view-item.php',$data);
			return view('master', $data);

		}
	}

	public function showItem(){
		$model = new Item();
		$data['results'] = $model->fetchAllItem();
		$data['body']	=	view('pages/view-item.php',$data);
		return view('master',$data);


	}

	public function editItem($id){
		$model = new Item();
		$data['result'] = $model->fetchEditItem($id);
		$data['body']	=	view('pages/edit-item.php',$data);
		return view('master',$data);
	}

	public function updateItem(){
		helper('form');
		$model = new Item();
		if (! $this->validate([
			'product_name'   => 'required',
			'product_code'   => 'required',
			'product_price'  => 'required',
			'description'    => 'required',
		],
		[   // Errors
			'product_name' => [
				'required' => 'All accounts must have usernames',
			],
			'product_code' => [
				'required' => 'Your password is too short. You want to get hacked?'
			]
		]
		
		))
		{
			$id		=	$this->request->getPost('id');
			return $this->editItem($id);
		}
		else
		{			
		$id				=	$this->request->getPost('id');
		$product_name	=	$this->request->getPost('product_name');
		$product_code	=	$this->request->getPost('product_code');
		$product_price	=	$this->request->getPost('product_price');
		$description	=	$this->request->getPost('description');
		
		$sql = "UPDATE `items` SET `product_name` = '$product_name',`product_code` = '$product_code',`product_price` = $product_price,`description` = '$description' WHERE `id` = $id";

		Database::connect()->query($sql);
		
		$data['results'] = $model->fetchAllItem();
		$data['body'] = view('pages/view-item.php',$data);
		return view('master', $data);

		}

	}

}