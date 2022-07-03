<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class mypublications extends Sximo  {
	
	protected $table = 'con_publications';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_publications.* FROM con_publications  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_publications.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
