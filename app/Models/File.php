<?php namespace App\Models;

use Config\Database;
use CodeIgniter\Model;

class File extends Model
{
    protected $table = 'files';

    protected $allowedFields = ['file_name', 'file'];

    public function uploadFile($data){
        $file_name	    =	$data['file_name'];
        $file_path	    =	$data['file_path'];
        
        $sql	=	"INSERT INTO `files` (`file_name`, `file`) VALUES ('$file_name', '$file_path')";
		$query	=	Database::connect()->query($sql);
        return;
    }
    
}