<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class portfoliocategory extends Sximo  {
	
	protected $table = 'portfolio_category';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT portfolio_category.* FROM portfolio_category  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE portfolio_category.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
