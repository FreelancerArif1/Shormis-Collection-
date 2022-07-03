<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cit extends Model {

	 public static function getMedicine($id){
		$value = DB::table('con_medicine')->where('id', $id)->first();
		return $value;
	}
	public static function getGenericName($id){
		$value = DB::table('con_medicine_generic')->where('id', $id)->first();
		return $value->name;
	}
	

}