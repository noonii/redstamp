<?php

class Login {

	function __construct() {

		require 'core/hasher.class.php';

		global $func, $db;

		$this->func = $func;
		$this->db = $db;
		$this->hasher = new Hasher;

	}

	function try($data) {

		if ($this->isCorrect($data)) {

			$_SESSION['login'] = $data['email'];
			$this->func->msg('s', '<i class="fa fa-spin fa-spinner"></i> Successfully logged in...');
			$this->func->redirect('index.php?page=5', 1500);
			return true;
		}
		return false;
	}

	function isCorrect($data) {

		$getPassword = $this->db->single('SELECT pass FROM users WHERE email_address = ?', array($data['email']));

		if ($this->hasher->verify($data['pass1'], $getPassword) === true) {
			return true;
		} else {
			$this->func->msg("d", "Wrong E-mail Address or Password entered.");
			return false;
		}
	}

	/**
	* In real production this would be alot more secure haha
	*/
	public static function isLoggedIn() {
		return isset($_SESSION['login']) ? $_SESSION['login'] : null;
	}

	
}