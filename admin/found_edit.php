<?php
@include '../config/connection.php';

if (isset($_GET['edit'])) {
    $id = mysqli_real_escape_string($connection, $_GET['edit']);
    $select = mysqli_query($connection, "SELECT * FROM found_items WHERE id = $id");

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
    } else {
        // Handle the case where the item ID is not found
        $message = "Item not found.";
        header("Location: found_items.php"); // Redirect to the main page
        exit();
    }
}

if (isset($_POST['update'])) {
    $update_id = mysqli_real_escape_string($connection, $_POST['update_id']);
    $item_category = mysqli_real_escape_string($connection, $_POST['item_category']);
    $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
    $old_image = mysqli_real_escape_string($connection, $_POST['old_image']); //hidden input

    $item_image_name = $_FILES['item_image']['name'];
    $item_image_tmp_name = $_FILES['item_image']['tmp_name'];
    $item_image_error = $_FILES['item_image']['error'];
    $item_image_item = 'uploaded_img/' . $item_image_name;

    $message = array();

    if (empty($item_category) || empty($item_name)) {
        $message[] = 'Please fill out all fields.';
    } else {
        $update_query = "UPDATE found_items SET item_category='$item_category', item_name='$item_name' ";

        if ($item_image_name) { //if a new image is uploaded
            if ($item_image_error === UPLOAD_ERR_OK) {
                if (is_dir('uploaded_img')) {
                    if (is_writable('uploaded_img')) {
                        if (move_uploaded_file($item_image_tmp_name, $item_image_item)) {
                            $update_query .= ", image='$item_image_name' "; //append image to query

                            //delete old image
                            if (file_exists("uploaded_img/" . $old_image) && !empty($old_image)) {
                                unlink("uploaded_img/" . $old_image);
                            }
                        } else {
                            $message[] = 'Failed to move the uploaded file to the destination directory.';
                        }
                    } else {
                        $message[] = 'The "uploaded_img" directory is not writable. Please check permissions.';
                    }
                } else {
                    $message[] = 'The "uploaded_img" directory does not exist. Please create it in your project root.';
                }
            } else {
                $message[] = 'File upload error: ' . $item_image_error;
                 switch ($item_image_error) {
                    case UPLOAD_ERR_INI_SIZE:
                        $message[] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $message[] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $message[] = 'The uploaded file was only partially uploaded.';
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $message[] = 'No file was uploaded.';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $message[] = 'Missing a temporary folder.';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $message[] = 'Failed to write file to disk.';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $message[] = 'File upload stopped by extension.';
                        break;
                    default:
                        $message[] = 'Unknown upload error.';
                }
            }
        }
        $update_query .= " WHERE id = '$update_id'";
        $update = mysqli_query($connection, $update_query);

        if ($update) {
            $message[] = 'Item updated successfully.';
            header("Location: found_items.php"); //redirect
            exit();
        } else {
            $message[] = 'Error updating item: ' . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="found.css">
    <title>Edit Item</title>
</head>
<body>
    <div class="container">
        <div class="admin-item-form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <h3>Edit Found Items</h3>
                <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
                <input type="text" placeholder="Enter Item Category" name="item_category" class="box" value="<?php echo htmlspecialchars($row['item_category']); ?>">
                <input type="text" placeholder="Enter Item Name" name="item_name" class="box" value="<?php echo htmlspecialchars($row['item_name']); ?>">
                <img src="uploaded_img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>" width="100">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="item_image" class="box">
                <input type="submit" class="btn" name="update" value="Update">
                <a href="found_items.php" class="btn cancel">Cancel</a>
            </form>
             <?php
            if (isset($message)) {
                echo '<div class="message-container">';
                foreach ($message as $msg) {
                    echo '<span class="message">' . $msg . '</span>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
