<?php
class Hasher {

	function __construct() {

		global $config;

		$this->key = null;

	}

	/**
	* Hash your string using BCRYPT
	* @param $string - Usually a password
	* @return - Return hashed value
	*/
	function hash($string) {

		$crypt = password_hash($string, PASSWORD_BCRYPT);
		
		return $crypt;
	}

	/**
	* Verify if your password is correct
	* @param $password_entered - String value
	* @param $hashed_password - String value Usually grabbed from Database
	* @return - True if equal
	*/ 
	function verify($password_entered = null, $hashed_password) {

		return password_verify($password_entered, $hashed_password);
			
	}
}