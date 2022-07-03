<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourletestnews extends Sximo  {
	
	protected $table = 'tbl_letest_news';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tbl_letest_news.* FROM tbl_letest_news  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tbl_letest_news.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
