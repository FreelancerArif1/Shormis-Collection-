<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class whytalentsourcing extends Sximo  {
	
	protected $table = 'tbl_why_us';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_why_us.* FROM tbl_why_us  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_why_us.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
