<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class mycareerhistory extends Sximo  {
	
	protected $table = 'con_career_history';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_career_history.* FROM con_career_history  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_career_history.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
