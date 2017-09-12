<?php

global $func;

require 'includes/navbar.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12"> 

            Homepage 
            </br>
            <h3>You can register an account or use the below login details to see the newsletter!</h3>
            </br>
            <p>Username: test@gmail.com</p>
            <p>Password: superman</p>
            
                <div id="troll" style="margin-left:25%; opacity:0">
                    <img src="https://i.ytimg.com/vi/2fb-g_V-UT4/hqdefault.jpg" />
                </div>

        </div>
    </div>
</div>

<script>
    var troll = document.getElementById('troll');
    troll.onmouseover = function() {
        this.style.animation = 'fadeOutLeft 1s forwards';
        this.style.animationDuration = '4s';
        this.onmouseover = null; // once
    }
</script>