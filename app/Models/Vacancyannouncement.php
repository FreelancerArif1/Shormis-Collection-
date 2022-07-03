<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class vacancyannouncement extends Sximo  {
	
	protected $table = 'con_circular';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_circular.* FROM con_circular  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_circular.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
