<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['body']	=	view('pages/home.php');
		return view('master',$data);
	}

	//--------------------------------------------------------------------

}
