<?php include('partials/menu.php') ?>

<div class="main_content">
    <div class="wrapper">
        <h1> Manage Category</h1>

        <br><br><br>
        <?php
        
        if(isset($_SESSION['add']))
        {
         echo $_SESSION['add'];
        unset($_SESSION['add']);

        }

        ?>
        <br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>
        
        <table class="table">

         <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
         </tr> 
         <?php
          $sql="SELECT * FROM tbl_category";

          $res= mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if($count>0) {
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>

          <tr>
            <td>1</td>
            <td><?php echo $title; ?></td>
            <td><?php echo $image_name; ?></td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
            <a href="#" class="btn-secondary">Update Category</a>
            <a href="#" class="btn-danger">Delete Category</a>
            </td>
          </tr>
                <?php
            }

          }
          else {
            ?>
            <tr>
                <td colspan="6"><div class="error">No category Added.</div></td>
            </tr>
            <?php
          }
         ?>

         
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>