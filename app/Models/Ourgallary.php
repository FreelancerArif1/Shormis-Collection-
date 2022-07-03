<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourgallary extends Sximo  {
	
	protected $table = 'our_gallary';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT our_gallary.* FROM our_gallary  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE our_gallary.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
