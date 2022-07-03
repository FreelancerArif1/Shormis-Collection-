<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourtestimonials extends Sximo  {
	
	protected $table = 'dit_testimonials';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_testimonials.* FROM dit_testimonials  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_testimonials.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
