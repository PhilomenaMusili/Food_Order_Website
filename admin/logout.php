<?php

 include('../config/constants.php'); 

//destroy session
session_destroy();

//redirect to login page
 header('location:'.SITEFUL.'admin/login.php');

?>