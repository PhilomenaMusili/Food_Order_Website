<?php include('partials/menu.php') ?>


 <div class="main_content">
        <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
        
        if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);

            }
        ?>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Add category title">

                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">

                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No

                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No

                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>
        <?php
        //check if submit buttom is clicked
        if(isset($_POST['submit']))
        {
            $title= $_POST['title'];

            if(isset($_POST['featured'])) 
            {
                $featured= $_POST['featured'];

            }
            else 
            {
                $featured="No";

            }

            if(isset($_POST['active'])) 
            {
                $active= $_POST['active'];

            }
            else 
            {
                $active="No";

            }
            //check whether the img is selected or not and set th value for img
            print_r($_FILES['image']);

            die();//break the code here

            //sql to insert category to db
            $sql="INSERT INTO tbl_category SET
               title='$title',
               featured='$featured',
               active='$active'
            ";

            //execute query
            $res = mysqli_query($conn,$sql);

            //check out if querry is executed or not

            if($res==true)
            {
                $_SESSION['add'] = "<div class='success text-center'>Category Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
 

            }
            else{
                //failed to add category
                $_SESSION['add'] = "<div class='error text-center'>failed to add category.</div>";
                header('location:'.SITEURL.'admin/add-category.php');
 
            }


        }
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>