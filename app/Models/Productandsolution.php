<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class productandsolution extends Sximo  {
	
	protected $table = 'products_solution';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT products_solution.* FROM products_solution  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE products_solution.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
