<?php include('partials/menu.php') ?>


<div class="main_content">
    <div class="wrapper">
    <h1>Change Password</h1>
 <br><br>

 <?php
 if(isset($_GET['id']))
    {
        $id=$_GET['id'];

    }
?>
  
 <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Current Password</td>
            <td>
                <input type="password" name="current_password" placeholder="enter current password">
            </td>
        </tr>

        <tr>
            <td>New Password</td>
            <td>
                <input type="password" name="new_password" placeholder="enter new password">
            </td>
        </tr>

        <tr>
            <td>Confirm Password</td>
            <td>
                <input type="password" name="confirm_password" placeholder="confirm password">
            </td>
        </tr>

        <tr>
            
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change password" class="btn-secondary">
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
        $current_password= md5($_POST['current_password']);
        $new_password= md5($_POST['new_password']);
        $confirm_password= md5($_POST['confirm_password']);
    //create sql query to update
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'
    ";

    //execute the query
    $res=mysqli_query($conn, $sql);

    //check if query is executed sccessfuly
    if($res==true){

        $count =mysqli_num_rows($res);

    //check whether have admin data or not
    if($count==1){

        //check if new password march with confirm pass

        if($new_password==$confirm_password)
        {
            //update pass
            $sql2 = "UPDATE tbl_admin SET 
            password='$new_password'
            WHERE id=$id
            ";

            //execute query
            $res2=mysqli_query($conn, $sql2);

            if($res2==true){
                  
            $_SESSION['pwd-change'] = "<div class='success'>Passsword changed.</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-admin.php');
        

            }
            else
            {
                $_SESSION['pwd-change'] = "<div class='error'>Passsword not changed.</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-admin.php');

            }
        }
        else {
            
            $_SESSION['pwd-not-match'] = "<div class='error'>Passsword did not match.</div>";
        //redirect
        header('location:'.SITEURL.'admin/manage-admin.php');
    

        }

    }
    else {
        $_SESSION['user-not-found'] = "<div class='error'>Failed to Update.</div>";
        //redirect
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
 }
} 
?>

<?php include('partials/footer.php'); ?>
