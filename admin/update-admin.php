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
                <input type="hidden" name="id" value="<?php echo $id; ?>">
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
    //get all values from form to update
        $id= $_POST['id'];
        $full_name= $_POST['full_name'];
        $username= $_POST['username'];
    //create sql query to update
    $sql = "UPDATE tbl_admin SET full_name ='$full_name',
    username= '$username'
    WHERE id ='$id'
    ";

    //execute the query
    $res=mysqli_query($conn, $sql);

    //check if query is executed sccessfuly
    if($res==true){
        $_SESSION['update']="<div class='success'>Admin updated Successfuly.</div>";
        
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');


    }
    else {
        $_SESSION['update']="<div class='error'>Failed to Update.</div>";
        
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    
    

    }
 }
?>

<?php include('partials/footer.php') ?>
