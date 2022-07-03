<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class rolecategory extends Sximo  {
	
	protected $table = 'tbl_role_catgory';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_role_catgory.* FROM tbl_role_catgory  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_role_catgory.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
