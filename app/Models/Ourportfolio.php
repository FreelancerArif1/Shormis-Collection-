<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourportfolio extends Sximo  {
	
	protected $table = 'our_protfolios';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT our_protfolios.* FROM our_protfolios  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE our_protfolios.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
