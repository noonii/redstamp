const elixir = require( 'laravel-elixir' );

require( 'laravel-elixir-webpack' );

elixir( mix => {

    mix
        .copy('resources/assets/js/login.js', 'assets/js')  

        // Custom
        .sass(['app.scss', 'waves.scss'], 'assets/css') // Global CSS        
        .webpack( 'resources/assets/js/app.js', {}, './assets/js/app.js') // Grouped JS files

        // Vendor
        .styles([  
            'resources/assets/vendor/bootstrap/css/bootstrap.min.css',          
            'resources/assets/vendor/animate/animate.css',            
        ], 'assets/css/vendor.css', './')                                
        .scripts([                     
            'resources/assets/vendor/jquery/jquery-3.1.1.min.js',                        
            'resources/assets/vendor/bootstrap/js/bootstrap.min.js',   
            'resources/assets/vendor/waves/js/waves.js'
        ], 'assets/js/vendor.js', './');

        
                   
} );