<?php

if (!class_exists("logout")) {

	class logout {

		function __construct() {

			global $func;

			$this->func = $func;

		}

		function fetchMessage() {

			$session = isset($_SESSION['login']) && ($_SESSION['login'] != null) ? $_SESSION['login'] : null;

			switch($session) {

				case null:
				case "":
					$this->func->msg("d", "You are already logged out.<div class='spacer2'></div><a href='index.php?page=3' class='btn btn-primary'><i class='fa fa-sign-in'></i> Sign in</a>");
					break;

				default:
					session_destroy();
					$this->func->msg("w", "You have succesfully logged out.<div class='spacer2'></div><a href='index.php?page=3' class='btn btn-primary'><i class='fa fa-sign-in'></i> Sign back in</a>");
					break;

			}

		}

	}


}