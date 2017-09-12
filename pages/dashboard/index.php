<?php

global $func;
// Remove after real production
if (!$func->handleAntiLogin()) {
    header('Location: index.php?page=0');
}

require 'includes/navbar.php';

?>

<!-- Content -->


<?php 
    // This page isn't really meant for the dashboard, but serves our showcase purposes
    include 'includes/newsletter.php';
?>

<!-- End of Content -->