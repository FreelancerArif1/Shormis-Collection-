<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class careerrequest extends Sximo  {
	
	protected $table = 'con_career';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_career.* FROM con_career  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_career.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
