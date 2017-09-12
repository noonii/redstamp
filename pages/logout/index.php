<?php

global $func;

if ($func->hasPHP()) {

	$func->fetchPHP();
	$logout = new logout;

}

require 'includes/navbar.php';

?>

</hr>

<div class="container">

	<div class="row">

		<div class="col-md-6 col-md-offset-3">

		
				<?php $logout->fetchMessage(); ?>


			</div>

		</div>

	</div>

</div>