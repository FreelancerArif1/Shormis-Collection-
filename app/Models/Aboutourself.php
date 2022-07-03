<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class aboutourself extends Sximo  {
	
	protected $table = 'tbl_about_us';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_about_us.* FROM tbl_about_us  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_about_us.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
