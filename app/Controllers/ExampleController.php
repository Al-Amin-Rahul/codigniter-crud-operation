<?php namespace App\Controllers;
use App\Models\Item;

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
			$data['body'] = view('pages/add-item.php');
			return view('master', $data);

		}
	}

	public function showItem(){
		$builder = $db->table('items');
		$data   = $builder->get();

		$data['body']	=	view('pages/view-item.php');
		return view('master',$data);


	}

}