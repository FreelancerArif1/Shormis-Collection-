<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourachivement extends Sximo  {
	
	protected $table = 'con_achivement';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_achivement.* FROM con_achivement  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_achivement.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
