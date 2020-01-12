<?php namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $allowedFields = ['product_name', 'product_code', 'product_price', 'description'];
    
}