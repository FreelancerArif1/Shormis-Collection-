<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourindustry extends Sximo  {
	
	protected $table = 'industries';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT industries.* FROM industries  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE industries.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
