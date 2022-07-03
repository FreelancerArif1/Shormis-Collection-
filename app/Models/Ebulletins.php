<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ebulletins extends Sximo  {
	
	protected $table = 'con_e_bulletin';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_e_bulletin.* FROM con_e_bulletin  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_e_bulletin.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
