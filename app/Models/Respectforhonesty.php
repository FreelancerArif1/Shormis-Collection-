<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class respectforhonesty extends Sximo  {
	
	protected $table = 'home_elements1';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT home_elements1.* FROM home_elements1  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE home_elements1.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
