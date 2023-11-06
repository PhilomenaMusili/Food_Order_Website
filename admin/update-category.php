<?php include('partials/menu.php');?>
<div class="main_content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br><br>

        <?php
        
        if(isset($_GET['id']))
        {
         $id = $_GET['id'];
         $sql = "SELECT * FROM tbl_category WHERE id=$id";

         $res = mysqli_query($conn, $sql);
         //count the rows to check if id is valid or not
         $count = mysqli_num_rows($res);

         if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $current_image = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];


         }
         else {
            $_SESSION['no-category-found'] = "<div class='error text-center'>Category  not found.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');

         }

        }
        else {
            header('location:'.SITEURL.'admin/manage-category.php');


        }
     ?>
        <form action="" method="POST" enctype="multipart/form data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Curent image_name</td>
                    <td>
                       <?php
                       if($current_image != "") {
                        //display img
                        ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?> " width="150px">
                        <?php
                       }
                       else {
                        //display mssg
                        echo "<div class='error'>Image Not Added.</div>";
                        
                       }
                       ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td> Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?>type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="no"){echo "checked";} ?>type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="submit" name="submit" value="update-category" class="btn-secondary">
                    </td>
                </tr>
            </table>
      </form>
</div>

<?php include('partials/footer.php');?>