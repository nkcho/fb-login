<?php 
// get configs
require './config/fb-configs.php'; 

// controlling session status
if(isset($_SESSION['access_token'])):
    
    // call dashboard
    include 'views/home.html.php';
 
else: 
    // call landing page
    include 'views/landing page.html.php';

endif;

if(isset($_GET['logout'])):
    session_destroy();

    unset($_SESSION['access_token']);
    header('Location: index.php');
endif;

?>
