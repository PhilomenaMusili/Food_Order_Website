<?php
include('../config/constants.php');

//check if id and img name have been passed

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    echo "tgytgdytgydtd";

}
else {
    //redirect
    header('location:'.SITEURL. 'admin/manage-category.php');
}
?>