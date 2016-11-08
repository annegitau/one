<?php
/*
*@Author Anne Gitau
*/
include_once("adb.php");
/**
*Users  class
*/
class users extends adb{
	function users(){
	}
	
	*/
	function addUser($username='none',$firstname='none',$lastname='none',$password='none',$phonenumber='none',$status='DISABLED'){
		$strQuery="insert into users set
						username='$username',
						firstname='$firstname',
						lastname='$lastname',
						password=MD5('$password'),
						phonenumber=$phonenumber,
						status=$status";
		return $this->query($strQuery);				
	}
    /**
	*gets user records based on the filter
	*@param string mixed condition to filter. If  false, then filter will not be applied
	*@return boolean true if successful, else false
	*/
	function getUsers($filter=false){
		$strQuery="select * from users";
		if($filter!=false){
			$strQuery=$strQuery. " where $filter";
		}
		 $strQuery;
		return $this->query($strQuery);		
	}	
	/**
	*Searches for user by username, fristname, lastname 
	*@param string text search text
	*@return boolean true if successful, else false
	*/
	function searchUsers($text=false,$usergroup=false){
		$filter=false;
		if($text!=false && $usergroup!=false){
			$filter="(username like '%$text%' or firstname like '%$text%' or lastname like '%$text%' ) and phonenumber=$usergroup";
		}
		else if($text!=false){
				$filter="(username like '%$text%' or firstname like '%$text%' or lastname like '%$text%')";
				}
		else if($usergroup!=false){
			$filter="phonenumber=$phonenumber";
		}		
		return $this->getUsers($filter);
	}
	function editUsers($username,$firstname,$lastname,$phonenumber){
		$strQuery="update users set
						firstname='$firstname',
						lastname='$lastname',
						phonenumber='$phonenumber' where username=$username	";
						echo "User Edited";
		return $this->query($strQuery);				
	}
	
	function updateStatus($usercode,$status){
			$user=strcmp("ENABLED", $status);
			if($user==0){
				$strQuery="UPDATE users set status='DISABLED' WHERE usernmae=$username";
			}
			else{
				$strQuery="UPDATE users set status='ENABLED' WHERE username=$username";
				}
				echo "Status Updated";
		 return $this->query($strQuery);
	}
	/**
	*delete user
	*@param int usercode the user code to be deleted
	*returns true if the user is deleted, else false
	*/
	function deleteUser($usercode){
		$strQuery= "delete from users where username='$username'";
		echo "User Deleted";
		return $this->query($strQuery);
		
	}
}
?>