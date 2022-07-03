<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bannerslider extends Sximo  {
	
	protected $table = 'con_banner_slider';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_banner_slider.* FROM con_banner_slider  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_banner_slider.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
