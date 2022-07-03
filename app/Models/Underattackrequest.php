<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class underattackrequest extends Sximo  {
	
	protected $table = 'under_attack_request';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT under_attack_request.* FROM under_attack_request  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE under_attack_request.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
