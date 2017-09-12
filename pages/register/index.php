<?php

global $func;

if ($func->hasPHP()) {
    
    $func->fetchPHP();
    $reg = new register;
}

$submitted = isset($_POST['submit']);
$data = array(
	"email" => isset($_POST['email']) ? $_POST['email'] : null,
	"pass1" => isset($_POST['pass1']) ? $_POST['pass1'] : null,
	"pass2" => isset($_POST['pass2']) ? $_POST['pass2'] : null
);

//require 'includes/navbar.php';

?>

<div class="container">
	<section class="register">		
		<header class="header">
			<h1><?php if (!$submitted): ?>Place your fingerprint here!<?php endif;?></h1>	
		</header>

		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				
				<div class="box-body">
					<?php if (!$submitted): ?>							
						<div class="fingerprint"></div>
					<?php endif; ?>
																				
					<div class="overlay">	

						<?php							
							if ($submitted) {
								$reg->try($data);			
							} else {
								echo '<p class="text-center">Create your credentials below!</p> <hr>';
							}
						?>

						<form method="post" action="">
							
							<div class="box-body">	

								<div class="form-group">								
									<input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" placeholder="E-Mail" required>
								</div>	

								<div class="form-group">								
									<input type="password" class="form-control" name="pass1" value="<?php echo $data['pass1']; ?>" placeholder="Password" required>
								</div>

								<div class="form-group">								
									<input type="password" class="form-control" name="pass2" value="<?php echo $data['pass2']; ?>" placeholder="Confirm Password" required>
								</div>

							</div>

							<div class="box-footer col-md-12">								
								<button type="submit" name="submit" class="btn btn-primary">Register</button>							
								<div style="margin-top:15px">
									<a href="#" class="pull-left">Forgot your password?</a>
									<a href="?page=3" class="pull-right">Login</a>
								</div>
							</div>
						</form>
					</div> <!-- /.overlay -->					
				</div> <!-- /.box-body -->
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</section> <!-- /.register -->
</div> <!-- /.container -->

<script src="assets/js/login.js"></script>
<script>
	<?php  if ($submitted):   ?>		
		// fingerPrint.style.display = 'none';
		overlay.classList.add("fadeIn");
		fadeInText(header, "Welcome!");		
	<?php endif; ?>
</script>