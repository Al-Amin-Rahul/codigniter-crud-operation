<?php namespace App\Controllers;
use App\Models\File;
use App\Models\Item;
use Config\Database;
use Config\Services;
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
			$data	=	array([
				'product_name'   => $this->request->getPost('product_name'),
				'product_code'   => $this->request->getPost('product_code'),
				'product_price'  => $this->request->getPost('product_price'),
				'description'    => $this->request->getPost('description'),
			]);

			$model->addItem($data[0]);

			Services::session()->setFlashdata('Message', 'Success');
			return redirect()->to('show-item');

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

	public function deleteItem($id){
		$model = new Item();
		$model->deleteItem($id);
		$data['results'] = $model->fetchAllItem();
		$data['body'] = view('pages/view-item.php',$data);
		return view('master', $data);
	}

	public function addFile(){

		if($this->request->getMethod() !== 'post'){
			$data['body'] = view('pages/add-file.php');
			return view('master', $data);
		}else{
			if (! $this->validate([
				'file_name'   => 'required',
				//'file'   	  => 'required',
			],
			[   // Errors
				'file_name' => [
					'required' => 'must have names',
				],
				'file' => [
					'required' => 'file required'
				]
			]
			
			))
			{
				$data['body'] = view('pages/add-file.php');
				return view('master', $data);
				
			}else{
				$file	    = $this->request->getFile('file');

				$fileName	= $file->getClientName();
				$file_path	=  'uploads/'.$fileName;
				$file->move('uploads/',$fileName);

				$data	=	array([
					'file_name'	=>	$this->request->getPost('file_name'),
					'file_path'	=>  $file_path,
				]);

				$model	=	new File();
				$model->uploadFile($data[0]);
				Services::session()->setFlashdata('Message', 'Success');
				return redirect()->to(base_url());

				
			}
		}

	}

}