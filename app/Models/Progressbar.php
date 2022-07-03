<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class progressbar extends Sximo  {
	
	protected $table = 'dit_progress_bar';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dit_progress_bar.* FROM dit_progress_bar  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dit_progress_bar.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
