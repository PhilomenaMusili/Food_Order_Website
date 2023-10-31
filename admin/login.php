<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>
        
        <?php
        if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);

            }
        ?>
        <br><br>

        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter your Username"><br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter your password"><br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>

        </form>

        <p class="text-center">Created by - <a href="philomenamusli2@gmail.com">Philomena Kyalo</a></p>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    $username= $_POST['username'];
    $password= md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

    $res=mysqli_query($conn, $sql);

    //count rows to check if user exist or not
    $count =mysqli_num_rows($res);

    //check whether have admin data or not
    if($count==1){
        //USER AVAILABLE
        $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
        //redirect
        header('location:'.SITEURL.'admin/login.php');


    }
    else{
        //USER NOT AVAILABLE
        $_SESSION['login'] = "<div class='error text-center'>Login Failed.Username or Password did not match</div>";
        //redirect
        header('location:'.SITEURL.'admin/login.php');
    }


}

?>