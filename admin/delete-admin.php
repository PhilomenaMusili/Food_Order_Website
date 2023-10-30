<?php
include('../config/constants.php');

//1. Get the id of the admin to delete
 $id =$_GET['id'];
//2. create sql query to delete admin
$sql ="DELETE FROM tbl_admin WHERE id=$id";

//execute query
$res=mysqli_query($conn, $sql);

//confirm whether the query is executed
if($res==true){
    //session variable tp dispaly mesage
    $_SESSION['delete']="<div class='success'>Admin deleted Successfuly.</div>";

    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');

}
else {
    //session variable tp dispaly mesage
    $_SESSION['delete']="<div class='error'>Failed to delete Admin. Try again .</div>";

    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
//3. Redirect to manage admin page with message succesfully deleted

?>