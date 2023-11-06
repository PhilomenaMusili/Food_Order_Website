<?php include('partials/menu.php');?>
<div class="main_content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br><br>
        <form action="" method="POST" enctype="multipart/form data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="">
                    </td>
                </tr>
                <tr>
                    <td>Curent $image_name</td>
                    <td>
                        image displayed here
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
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
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