<?php
include('../config/constants.php');

// Check if 'id' and 'image_name' have been passed
if (isset($_GET['id']) && isset($_GET['image_name'])) {
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if ($image_name != "") {
        $path = "../images/category/" . $image_name;

        // Check if the file exists before attempting to remove it
        if (file_exists($path)) {
            $remove = unlink($path);

            if ($remove == false) {
                $_SESSION['remove'] = "<div class='error text-center'>Failed to remove category image.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
                die();
            }
        } else {
            // The file doesn't exist, so you may want to add a message or log this event.
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['delete'] = "<div class='success text-center'>Category image Deleted Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['delete'] = "<div class='error text-center'>Category image not Deleted Successfully.</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
} else {
    header('location:' . SITEURL . 'admin/manage-category.php');
}
?>
