<?php include('partials/menu.php') ?>

 <div class="main_content">
        <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Add category title">

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
            //sql to insert category to db
            $sql="INSERT INTO tbl_category SET
               title='$title',
               featured='$featured',
               active='$active'
            ";

            //execute query
            $res=mysqli_query($conn,$sql);

            //check out if querry is executed or not

            if($res==true){

            }
            else{
                //faile to execute query
            }


        }
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>