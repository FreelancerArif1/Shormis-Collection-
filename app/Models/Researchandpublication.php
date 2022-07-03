<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class researchandpublication extends Sximo  {
	
	protected $table = 'con_research_and_publication';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT con_research_and_publication.* FROM con_research_and_publication  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE con_research_and_publication.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
