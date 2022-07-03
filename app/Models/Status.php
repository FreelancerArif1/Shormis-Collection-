<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class status extends Sximo  {
	
	protected $table = 'status';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT status.* FROM status  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE status.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
