<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
  <h1>Add Admin </h1>
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
  username='$username',
  password='$password'
  ";
  
  // 3. Execute query and save data to db
  
}

?>