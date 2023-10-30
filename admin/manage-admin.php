<?php include('partials/menu.php'); ?>

      <div class="main_content">
      <div class="wrapper">
        <h1>Manage Admin</h1>
        <br><br><br>

        <?php
         if(isset($_SESSION['add']))
         {
          
          echo $_SESSION['add']; //displaying the message
          unset ($_SESSION['add']); //removing the session mesage
         }

         if(isset($_SESSION['delete']))
         {
          
          echo $_SESSION['delete']; //displaying the message
          unset ($_SESSION['delete']); //removing the session mesage
         }

         if(isset($_SESSION['update']))
         {
          
          echo $_SESSION['update']; //displaying the message
          unset ($_SESSION['update']); //removing the session mesage
         }
        ?>
        <br><br>
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br><br>
        <table class="table">

         <tr>
          <th>S.N</th>
          <th>Full name</th>
          <th>Username</th>
          <th>Actions</th>
         </tr> 
         <?php 
          // Query to get all Admin
          $sql ="SELECT * FROM tbl_admin";

          //Execute the query
          $res = mysqli_query($conn, $sql);

          //check if query ic executed or not 
          $count =mysqli_num_rows($res); //Func to get all rows in db

          $sn=1; //create a variable and assign the value
         
          //check nm of rows
          if($count>0){
            //we have data in db

            while($rows=mysqli_fetch_assoc($res))
            {
              //using while loop to get all data from db

              //get individual data
              $id=$rows['id'];
              $full_name=$rows['full_name'];
              $username=$rows['username'];

              //display the value in your table
              ?>
               <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                  <a class="btn-primary">Change Password </a>
                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                </td>
             </tr>


              <?php

            }
          }
        else {
          //we dont have data in db
        }
         ?>

         

         
        </table>

        

      </div>
      <?php include('partials/footer.php'); ?>