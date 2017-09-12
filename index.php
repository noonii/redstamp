<?php

session_start();

global $config, $db, $system, $func;

require 'core/loader.class.php';
$loader = new Loader;

if ($func->handleAntiLogin() === false) {
	header('Location: index.php?page=0');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php $loader->loadHead(); ?>
</head>
<body>
    <!-- Content -->
    <?php $loader->loadSystem(); ?>    
    <!-- End of Content -->

    <!-- Footer -->
    <?php $loader->loadFooter(); ?>
    <!-- End of Footer -->
</body>
</html>