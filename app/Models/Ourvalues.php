<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourvalues extends Sximo  {
	
	protected $table = 'tbl_our_values';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_our_values.* FROM tbl_our_values  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_our_values.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
