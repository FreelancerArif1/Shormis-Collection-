<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourteam extends Sximo  {
	
	protected $table = 'con_team';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_team.* FROM con_team  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_team.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
