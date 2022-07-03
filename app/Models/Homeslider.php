<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class homeslider extends Sximo  {
	
	protected $table = 'home_slider';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT home_slider.* FROM home_slider  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE home_slider.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
