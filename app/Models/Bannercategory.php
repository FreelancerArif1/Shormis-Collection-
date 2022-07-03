<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bannercategory extends Sximo  {
	
	protected $table = 'dit_banner_gategory';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_banner_gategory.* FROM dit_banner_gategory  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_banner_gategory.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
