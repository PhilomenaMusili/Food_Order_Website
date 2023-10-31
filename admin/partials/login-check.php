<?php
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-msg'] = "<div class='error text-center'>Please log in to access admin panel</div>";
    header('location:'.SITEURL.'admin/login.php');


}
?>