<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ourclients extends Sximo  {
	
	protected $table = 'our_clients';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT our_clients.* FROM our_clients  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE our_clients.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
