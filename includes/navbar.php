<?php
  
  require 'pages/login/php/login.php';
  require 'pages/logout/php/logout.php';


?>

<nav class="navbar navbar-default">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php?page=0">
      <!-- <i class="fa fa-envelope"></i>  -->
      <img style="display:inline"src="assets/img/testing_1.png" height=20px width=20px/> <?php echo strtolower(config['website_name']); ?>
    </a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

  <ul class="nav navbar-nav">
    <?php if (isset($_GET['page']) && $_GET['page'] === '5'): // temporary solution not realistic?>
        
        <li><a href="#">YOU</a></li>
        <li><a href="#">KNOW</a></li>
        <li><a href="#">NOTHING</a></li>
        <li><a href="#">JOHN</a></li>
        <li><a href="#">SNOW</a></li>      

    <?php elseif (Login::isLoggedIn()): ?>
        <li><a href="?page=5">Dashboard</a></li>
    <?php endif; ?>
    </ul>


    <ul class="nav navbar-nav navbar-right">

      <?php 
          if (!Login::isLoggedIn()) {
            echo '
              <li><a href="?page=3"><i class="fa fa-sign-in"></i> Login</a></li>
              
              <li><a href="?page=2"><i class="fa fa-user-plus"></i> Register</a></li>
            ';
          } else {
            echo '
              <li><a href="?page=4"><i class="fa fa-sign-out"></i> Logout</a></li>
            ';
          }
      ?>
      
    </ul>
  </div>
</div>
</nav>