<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourcompanysection extends Sximo  {
	
	protected $table = 'dit_our_company_section';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_our_company_section.* FROM dit_our_company_section  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_our_company_section.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
