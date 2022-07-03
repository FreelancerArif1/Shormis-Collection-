<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class contactrequest extends Sximo  {
	
	protected $table = 'contact';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT contact.* FROM contact  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE contact.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
