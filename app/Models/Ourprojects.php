<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourprojects extends Sximo  {
	
	protected $table = 'con_our_activities';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_our_activities.* FROM con_our_activities  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_our_activities.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
