<?php

require 'core/config.class.php';
require 'core/db.class.php';
require 'core/system.class.php';
require 'core/functions.class.php';

class Loader {
    
    function __construct() {
        
        global $config, $db, $system, $func;
        
        /* Loading all configurations */
        $config = new Config;
        $db = new DB( db['host'], db['datb'], db['user'], db['pass']);
        $func = new Functions;
        $system = new System;
            
        $this->system = $system;
    }

    /**
    * Loads all the page indexing from DB 
    */ 
    function loadSystem() {
        $this->system->load();
    }

    /**
    * Load <head> tag 
    * Includes stylesheets and scripts
    */ 
    function loadHead() {
        echo '              

            <title>' . config['website_title'] . '</title>
        
                <!-- Stylesheets -->
                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
                <link href="assets/css/vendor.css" rel="stylesheet">
                <link href="assets/css/app.css" rel="stylesheet">
        ';
    }

    function loadFooter() {
        echo '            
            <!-- JS -->                     
            <script src="assets/js/vendor.js"></script>
            <script src="assets/js/app.js"></script>   
        ';
    }
}