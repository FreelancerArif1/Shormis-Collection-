<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class upcoming extends Sximo  {
	
	protected $table = 'upcoming_event';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT upcoming_event.* FROM upcoming_event  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE upcoming_event.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
