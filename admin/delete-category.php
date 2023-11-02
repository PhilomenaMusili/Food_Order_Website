<?php
include('../config/constants.php');

//check if id and img name have been passed

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
   //
   $id = $_GET['image_name'];
   $image_name = $_GET['image_name'];

   if($image_name != "")
   {
    $path = "../images/category/".$image_name;

    //remove img
    $remove = unlink($path);

    //if failed to remove img stop the process
    if($remove==false)
    {
        $_SESSION['remove'] = "<div class='error text-center'> Failed to remove category image.</div>";

        //redirect to manage category
        header('location:'.SITEURL. 'admin/manage-category.php');
        //stop the process
        die();

    }
    
   }

}
else {
    //redirect
    header('location:'.SITEURL. 'admin/manage-category.php');
}
?>