<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ideologyquotation extends Sximo  {
	
	protected $table = 'con_ideology_quotation';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_ideology_quotation.* FROM con_ideology_quotation  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_ideology_quotation.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
