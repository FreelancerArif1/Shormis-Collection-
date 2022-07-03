<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class happyclients extends Sximo  {
	
	protected $table = 'tbl_client_say';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_client_say.* FROM tbl_client_say  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_client_say.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
