<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class websitesectionfour extends Sximo  {
	
	protected $table = 'dit_about_basic';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_about_basic.* FROM dit_about_basic  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_about_basic.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
