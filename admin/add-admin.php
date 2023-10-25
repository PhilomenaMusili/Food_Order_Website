<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
  <h1>Add Admin </h1>
<br><br>

<?php
         if(isset($_SESSION['add']))
         {
          
          echo $_SESSION['add']; //displaying the message
          unset ($_SESSION['add']); //removing the session mesage
         }
?>
   <br><br>
<form action="" method="POST">
 <table class="tbl-30">
    <tr>
        <td>Full Name: </td>
        <td>
            <input type="text" name="full_name" placeholder="Enter your name">
        </td>
    </tr>

    <tr>
        <td>Username: </td>
        <td>
            <input type="text" name="username" placeholder="Enter your username">
        </td>
    </tr>

    <tr>
        <td>Password: </td>
        <td>
            <input type="password" name="password" placeholder="Enter your password">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary"> 
        </td>
        
    </tr>

    
 </table>
</form>
</div>
</div>
<?php include('partials/footer.php'); ?>

<?php
    //process the value from the form and store it in the db

    //check wether the submit button is clicked
    if(isset($_POST['submit']))
    {
        //button clicked
    //1. get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);//password ecncription with MD5

    //2. sql query to save data in db
    $sql ="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username', password='$password'  
    ";

    //3. Executing Query and saving data into db
    $res =mysqli_query($conn, $sql) or die(mysqli_error());

    //4. check whether the query is executed and display the appriprioate message
    if($res==TRUE){
        //Data Inserted
      //Create a session variable to display message

      $_SESSION['add'] ="Admin Added Successfully";

      //Redirect Page to manage admin
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    else {
        //failed to insert data
        //Create a session variable to display message

      $_SESSION['add'] ="Failed to add admin Successfully";

      //Redirect Page to Admin admin
      header("location:".SITEURL.'admin/add-admin.php');
    }



    }
?>