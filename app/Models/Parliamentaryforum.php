<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class parliamentaryforum extends Sximo  {
	
	protected $table = 'con_forum';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_forum.* FROM con_forum  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_forum.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
