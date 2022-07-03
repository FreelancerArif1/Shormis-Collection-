<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourmission extends Sximo  {
	
	protected $table = 'our_mission';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT our_mission.* FROM our_mission  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE our_mission.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
