<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class blogsandnews extends Sximo  {
	
	protected $table = 'dit_blocg_news';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_blocg_news.* FROM dit_blocg_news  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_blocg_news.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
