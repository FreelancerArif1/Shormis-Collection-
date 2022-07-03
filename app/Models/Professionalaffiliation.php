<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class professionalaffiliation extends Sximo  {
	
	protected $table = 'con_professional_affiliation';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_professional_affiliation.* FROM con_professional_affiliation  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_professional_affiliation.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
