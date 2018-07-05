<?php
 
 namespace App\Http;
 /**
  * 
  */
 class helpers
 {
 	public static function checkPermission($permissions){
 		$userAccess = self::getPermission(auth()->user()->is_permitted);
 		foreach($permissions as $key => $value){
 			if($value == $userAccess){
 				return true;
 			}
 		}
 		return false;
 	}

 	public static function  getPermission($id){
 		switch($id){
 			case 7:
 				return 'Managing Director' ;
 				break;
 			case 6:
 				return 'Chief Of Staffs';
 				break;
 			case 5:
 				return 'Deputy Managing Director';
 				break;
 			case 4:
 				return 'CEO';
 				break;
 			case 3:
 				return 'Directors';
 				break;
 			case 2:
 				return 'Assistant Managers';
 				break;
 			case 1:
 				return 'Managers';
 				break;
 			case 0:
 				return 'Consultant';
 				break;
 			default:
 				return 'Intern';
 		}
 	}
 }