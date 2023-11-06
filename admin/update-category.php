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
            </table>
      </form>
</div>

<?php include('partials/footer.php');?>