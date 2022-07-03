<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourservices extends Sximo  {
	
	protected $table = 'dit_services';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_services.* FROM dit_services  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_services.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
