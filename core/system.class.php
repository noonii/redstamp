<?php

class System {

    function __construct() {
        
        global $db, $config, $system, $func;

        $this->db = $db;
        
        $this->func = $func;

        // Set default value
        $this->page_dir = config['page_dir'];
    }
    
    /**
    * Fetch and load the page via page ID, if failed will load 404 error
    *
    */ 
    function load() {
        $page_id = isset($_GET['page']) && (is_numeric($_GET['page'])) ? $_GET['page'] : null;

        switch ($page_id) {
            case null:
            case 0:
            case 1:
                // HOME
                $this->fetchPage(0);
                break;
            default:
                if ($this->pageExists()) {
                    $this->fetchPage();
                } else {
                    // Page doesn't exist
                    $this->returnError(404);
                }
                
                break;
        }
    }

    /**
    * Fetch page ID from storage and display appropriate content
    */
    function fetchPage($page_id = null) {

        $id = isset($_GET['page']) && $page_id == null ? $_GET['page'] : null;

        switch ($id) {
            case null: 
            case 0:
            case 1:                                   
                require $this->page_dir . 'home/index.php';
                break;
            default:
                require $this->page_dir . $this->fetchPageName() . '/index.php';
                break;
        }
        
        
    }

    /**
    * Check if page exists in DB by querying page ID. 
    * @return - boolean value
    */
    function pageExists() {

        $page_id = isset($_GET['page']) && (is_numeric($_GET['page'])) ? $_GET['page'] : null;
                        
        $query = $this->db->query('SELECT * FROM pages WHERE id = ?', array($page_id));        

        if (count($query) > 0) {                 
            // Is the following page an existing directory / existing file? or active in DB
            return $this->isPageActive($query[0]['active']) && is_dir($this->page_dir . $this->fetchPageName()) && file_exists($this->page_dir . $this->fetchPageName() . "/index.php");
        } 
        return false;
    }

    /** TO:DO method used in diff class as well, fix redundancy
    * Get the page name from pages table via page ID
    * @return - String value of page name
    */
    function fetchPageName() {
        
        $page_id = isset($_GET['page']) && (is_numeric($_GET['page'])) ? $_GET['page'] : null;

        $query = $this->db->query('SELECT * FROM pages WHERE id = ?', array($page_id));

        if (count($query) > 0) {
            
            return $query[0]['page_name'];
        
        } else {
            
            return null;
        }  

    }

    function isPageActive($val) {
        return $val > 0;         
    }

    /**
    * Returns error message
    * @param $code - 404, 503, etc 
    */ 
    function returnError($code) {
        switch($code) {
            case 404:
                include 'includes/navbar.php';
                echo 'This page does not exist.';
                break;
        }
    }
}
