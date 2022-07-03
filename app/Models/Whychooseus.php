<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class whychooseus extends Sximo  {
	
	protected $table = 'dit_why_us_basic';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_why_us_basic.* FROM dit_why_us_basic  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_why_us_basic.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
