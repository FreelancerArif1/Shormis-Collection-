<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourmanagementprofile extends Sximo  {
	
	protected $table = 'management_profile';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT management_profile.* FROM management_profile  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE management_profile.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
