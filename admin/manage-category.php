<?php include('partials/menu.php') ?>

<div class="main_content">
    <div class="wrapper">
        <h1> Manage Category</h1>

        <br><br><br>
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>
        
        <table class="table">

         <tr>
          <th>S.N</th>
          <th>Full name</th>
          <th>Username</th>
          <th>Actions</th>
         </tr> 

         <tr>
          <td>1</td>
          <td>Mina</td>
          <td>Phil</td>
          <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
          </td>
         </tr>

         <tr>
          <td>2</td>
          <td>Mina</td>
          <td>Phil</td>
          <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
          </td>
         </tr>

         <tr>
          <td>3</td>
          <td>Mina</td>
          <td>Phil</td>
          <td>
          <a href="#" class="btn-secondary">Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
          </td>
         </tr>
        </table>
    </div>
</div>
<?php include('partials/footer.php') ?>