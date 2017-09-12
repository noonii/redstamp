<?php

class Register {
	
    function __construct() {

    	require 'core/hasher.class.php';

        global $db, $func;

        $this->func= $func;
        $this->db = $db;
        $this->hasher = new Hasher;
        
    }

    function try($data) {

        if ($this->verify($data)) {
            if ($this->emailTaken($data) == false) {
                $this->func->msg("s",  "Your account has been created.");
                $this->db->query('INSERT INTO users (email_address, pass, ip_addr) VALUES (?, ?, ?)', 
                    array (
                        $data['email'],
                        $this->hasher->hash($data['pass1']),
                        $_SERVER['REMOTE_ADDR']
                    ));
            } else {
                $this->func->msg("w", "This e-mail has already been taken.");
            }
        }
    	
    }

    function emailTaken($data) {
        $try = $this->db->query('SELECT * FROM users WHERE email_address = ?', array($data['email']));

        return count($try) > 0;
    }

    function verify($data) {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

            $this->func->msg('d', 'This is not a valid e-mail addres.');
            return false;

        }

        $length = strlen($data['pass1']);
        if ($length < config['min_password'] || $length > config['max_password']) {

            $this->func->msg('d', ' Your password should be between ' . config['min_password'] . ' and ' . config['max_password']);
            return false;
        }

        if ($data['pass1'] !== $data['pass2']) {

            $this->func->msg('d', 'Your passwords do not match.');
            return false;
        }

        return true;
    }
}