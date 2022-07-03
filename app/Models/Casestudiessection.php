<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class casestudiessection extends Sximo  {
	
	protected $table = 'dit_case_studies_section';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_case_studies_section.* FROM dit_case_studies_section  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_case_studies_section.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
