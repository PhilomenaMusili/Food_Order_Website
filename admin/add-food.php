<?php include('partials/menu.php') ?>


<div class="main_content">
    <div class="wrapper">
        <h1> Add Food</h1>
        <br><br><br>
        <form action="" method="POST" ecytype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="enter title of food">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="enter description of food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" >
                    </td>
                </tr>
                <tr>
                    <td>Select image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select  name="category" >
                            <?php 
                            $sql ="SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0){
                                //we have categories
                                while($row=mysqli_fetch_assoc($res))
                                {   
                                    //get details of categories
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>

                                     <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                    <?php
                                }

                            }
                            else {
                                //we do have category
                                ?>

                                <option value="0">No Category Found</option>
                                <?php
                            }
                            
                            ?>
                         
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> Featured: </td>
                    <td>
                        <input type="radio"  name="featured" value="Yes"> Yes
                        <input type="radio"  name="featured" value="No"> No

                    </td>
                </tr>
                <tr>
                    <td> Active: </td>
                    <td>
                        <input type="radio"  name="active" value="Yes"> Yes
                        <input type="radio"  name="active" value="No"> No

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

