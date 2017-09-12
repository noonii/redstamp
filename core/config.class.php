<?php

class Config {

    function __construct() {

        define( 'config', array( 

            'website_name'      => 'Redstamp',
            'website_title'     => 'Redstamp - Design Test',
            
            #Directory for pages
            'page_dir'          => 'pages/',

            'min_password'      => 5,
            'max_password'      => 25



        ) );

        define( 'db', array(
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'datb' => 'phpproject'
        ));


    }
}