<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class socialfeeds extends Sximo  {
	
	protected $table = 'con_social_feed';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_social_feed.* FROM con_social_feed  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_social_feed.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
