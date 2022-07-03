<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class mediacoverage extends Sximo  {
	
	protected $table = 'con_media_coverage';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_media_coverage.* FROM con_media_coverage  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_media_coverage.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
