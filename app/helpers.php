<?php
 
 namespace App\Http;
 /**
  * 
  */
  use DB;
 class helpers
 {
    /**
     * Add the assigned name to the drop down that correspond to team
     */
    public static function assigned($team){

		$assigned = DB::table('users')->where('team', $team)->pluck('name');
		
        return $assigned;
        
    }
 	
 }