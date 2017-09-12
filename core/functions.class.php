<?php

class Functions {

    function __construct() {

        global $func,$db;

        $this->db = $db;

    }

    /**
    * Prevent login attempts 
    *
    *
    */
    function handleAntiLogin() {
        $page_id = isset($_GET['page']) && (is_numeric($_GET['page'])) ? $_GET['page'] : null;

        $getRules = $this->db->single('SELECT anti_login FROM pages WHERE id = ?', array($page_id));

        if (!isset($_SESSION['login'])) {
            if ($getRules == 1) {
                return false;
            }
        }
        return true;                
    }

    /**
    * Get the file
    *
    */
    function fetchPHP() {

        if ($this->hasPHP()) {

            require_once config['page_dir'] . $this->fetchPageName() . '/php/' . $this->fetchPageName() . '.php';

        }

    }

    /**
    * Does this file exist in the provided pathing?
    *
    */
    function hasPHP() {

        return file_exists(config['page_dir'] . $this->fetchPageName() . '/php/' . $this->fetchPageName() . '.php');

    }
    
    /**
    * Redirect to specified link
    * @param $link - Path
    * @param $time - Time in milliseconds till we redirect    
    */
    function redirect($link, $time) {

        $new_time = $time != null ? $time : false;

        if ($new_time !== false) {

            echo '

                <script>
                    setTimeout(function(){
                        window.location.replace("'.$link.'");
                    }, '.$time.');
                </script>

                ';

        } else {

            echo '
                <script>
                    window.location.replace("'.$link.'");
                </script>

                ';
        }

    }

    /**
    * Fetch the name of a page from the database based on ID
    * @return - Page name if successful, otherwise null
    */    
    function fetchPageName() {

        $page_id = isset($_GET['page']) && (is_numeric($_GET['page'])) ? $_GET['page'] : null;

        $query = $this->db->query("SELECT * FROM pages WHERE id = ?", array($page_id));

        if (count($query) > 0) {
            
            return $query[0]['page_name'];
        
        } else {
            
            return null;
        }        
    }

    /**
    * Alert message    
    * @param $tag - Type of alert message
    * @param $msg - Output of alert message
    */
    function msg($tag, $msg) {

        switch ($tag) {

            case "s":
                $style = "success";
                $icon = "check";
                break;         

            case "w":
                $style = "warning";
                $icon = "exclamation-triangle";
                break;

            case "d":
                $style = "danger";
                $icon = "times";
                break;

            case "i":
                $style = "info";
                $icon = "exclamation-triangle";
                break;

            default:
                $style = "default";
                $icon = "question";
                break;
        }

        echo '<div class="alert alert-'.$style.' text-center"><i class="fa fa-'.$icon.'"></i> '.ucfirst($style).':<br />'.$msg.'</div>';
    }

}