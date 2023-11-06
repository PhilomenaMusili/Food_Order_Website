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
        <form action="" method="POST" enctype="multipart/form-data">
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
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="update-category" class="btn-secondary">
                    </td>
                </tr>
            </table>
      </form>
      <?php
      if(isset($_POST['submit']))
      {
        //get all the values from our form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['image_name'];
        $featured = $_POST['featured'];
        $actiive = $_POST['active'];

        //updating new img
        //check if img is selected or not
        if(isset($_FILES['images']['name'])) {
            $image_name = $_FILES['images']['name'];

            //check if img is available or not
            if($image_name != ""){
                //img is available
                //upload new img

        //auto rename img
        $ext = end(explode('.', $image_name));

        //rename img
        $image_name = "Food_Category_".rand(000, 999). "." .$ext; 

        $source_path= $_FILES['image']['tmp_name'];

        $destination_path="../images/category/".$image_name;

        //finally upload img
        $upload = move_uploaded_file($source_path, $destination_path);

        //check if img uploaded or not
        if($upload==false)
        {
            $_SESSION['upload'] = "<div class='error text-center'>image not uploaded.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
            //stop process
            die();
        }

                //remove current img if available
                if($current_image != "") {
                    $remove_path ="../images/category/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove==false){
                        //failsed to remove img
                        $_SESSION['failed-remove'] = "<div class='error text-center'>Failed to remove current image.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                         //stop process
                        die();
    
                    }

                }
              
    }
        else {
                $image_name = $current_image;
            }

        }
        else {
            $image_name = $current_image;
        }
        //update db
        $sql2 = "UPDATE tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$actiive'
        WHERE id=$id
        ";
        //execute query
        $res2 =mysqli_query($conn, $sql2);
        //redirect to manage category with msg
        if($res2==true)
        {
            //updated category
            $_SESSION['update'] = "<div class='success text-center'>Category updated Successfully.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');

        }
        else {
            //failed to update
            //updated category
            $_SESSION['update'] = "<div class='error text-center'>Failed to updated category.</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');

        }
      }
      
      ?>
</div>

<?php include('partials/footer.php');?>