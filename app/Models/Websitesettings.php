<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class websitesettings extends Sximo  {
	
	protected $table = 'settings';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT settings.* FROM settings  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE settings.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
