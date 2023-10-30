<?php include('partials/menu.php') ?>


<div class="main_content">
    <div class="wrapper">
    <h1>Update Admin</h1>
 <br><br>
 <?php
 //1. Get the id of the admin to Select
  $id =$_GET['id'];

  //SQL to get details
  $sql ="SELECT * FROM tbl_admin WHERE id=$id";
  
  //execute query
  $res=mysqli_query($conn, $sql);
  
  //confirm whether the query is executed
if($res==true){
   
    //check  whether data is available or not
    $count =mysqli_num_rows($res);

    //check whether have admin data or not
    if($count==1){
        //get details
        $row =mysqli_fetch_assoc($res);

        $full_name =$row['full_name'];
        $username =$row['username'];


    }
    else {
        //redirect
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
 
}

 
 ?>

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </td>
            </tr>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>
            <tr>
                
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </td>
            </tr>
        </table>


    </form>
    </div>
</div>

<?php
 if(isset($_POST['submit']))
 {
    //echo "button clicked";
 }
?>

<?php include('partials/footer.php') ?>
