<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class companysectionpost extends Sximo  {
	
	protected $table = 'dit_our_company_section_post';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_our_company_section_post.* FROM dit_our_company_section_post  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_our_company_section_post.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
