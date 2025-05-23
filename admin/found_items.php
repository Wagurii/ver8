<?php
@include '../config/connection.php';
session_start();
$message = array();

if (isset($_POST['Post'])) {

    // Category handling
    $item_category = $_POST['item_category'];
    if ($item_category === 'Others') {
        $item_category = trim($_POST['other_category']);
    }
    $item_name = $_POST['item_name'];
    $item_description = $_POST['item_description'];
    $date_surrendered = $_POST['date_surrendered'];
    $item_image_name = $_FILES['item_image']['name'];
    $item_image_tmp_name = $_FILES['item_image']['tmp_name'];
    $item_image_error = $_FILES['item_image']['error'];
    $item_image_item = 'uploaded_img/' . $item_image_name;

    if (empty($item_category) || empty($item_name) || empty($item_image_name)) {
        $message[] = 'Please fill out all fields.';
    } else {
        if ($item_image_error === UPLOAD_ERR_OK) {
            if (!is_dir('uploaded_img')) {
                mkdir('uploaded_img', 0755, true); // Create directory if it doesn't exist
            }
            if (is_writable('uploaded_img')) {
                if (move_uploaded_file($item_image_tmp_name, $item_image_item)) {
  $insert = "INSERT INTO found_items(item_category, item_name, item_description, date_surrendered, image)
                               VALUES('$item_category', '$item_name', '$item_description', '$date_surrendered', '$item_image_name')";                    $upload = mysqli_query($connection, $insert);
                    if ($upload) {
                        $message[] = 'Posting successful.';
                    } else {
                        $message[] = 'Error saving item details to the database: ' . mysqli_error($connection);
                    }
                } else {
                    $message[] = 'Failed to move the uploaded file to the destination directory.';
                }
            } else {
                $message[] = 'The "uploaded_img" directory is not writable. Please check permissions.';
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
}

if (isset($_GET['delete'])) {
    $id_to_delete = mysqli_real_escape_string($connection, $_GET['delete']); // Sanitize input
    mysqli_query($connection, "DELETE FROM found_items WHERE id = $id_to_delete");
    // Optionally, you can add a success message here
    header("Location: found_items.php"); // Redirect to refresh the list
    exit();
}

$select = mysqli_query($connection, "SELECT * FROM found_items");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="found.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="found.css">
</head>

<body>
<!-- Burger Menu Button -->
<button class="burger-menu" aria-label="Toggle Sidebar">
    <i class="fas fa-bars"></i>
</button>

<!-- Overlay for Mobile -->
<div class="overlay"></div>

<!-- Sidebar -->
<nav class="sidebar">
    <h2><?php echo ucfirst($_SESSION['user_type']); ?></h2>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <span>Users</span>
                <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="administrator.php" class="nav-link">
                        <i class="fas fa-circle nav-icon text-red"></i>
                        <span>Administrator</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="allOfficial.php" class="nav-link">
                        <i class="fas fa-circle nav-icon text-red"></i>
                        <span>Student</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="officialEndTerm.php" class="nav-link">
                        <i class="fas fa-circle nav-icon text-red"></i>
                        <span>Staff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="officialEndTerm.php" class="nav-link">
                        <i class="fas fa-circle nav-icon text-red"></i>
                        <span>Workers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="officialEndTerm.php" class="nav-link">
                        <i class="fas fa-circle nav-icon text-red"></i>
                        <span>Block</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="found_items.php" class="nav-link page-active">
                <i class="nav-icon fas fa-history"></i>
                <span>Found Items</span>
            </a>
        </li>
         <li class="nav-item">
            <a href="claim_items.php" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <span>Claim</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="systemLogs.php" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <span>System Logs</span>
            </a>
        </li>
    </ul>
</nav>


    <div class="content">
            <div class="admin-item-form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="item_name" class="form-label">Name of Item</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" required>
                </div>

                <div class="mb-3">
                    <label for="item_category" class="form-label">Category</label>
                    <select class="form-control" name="item_category" id="item_category" required onchange="toggleOtherCategory(this)">
                        <option value="">Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Books">Books</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Others">Others (specify below)</option>
                    </select>
                    <input type="text" class="form-control mt-2" name="other_category" id="other_category" style="display:none;" placeholder="Please specify category">
                </div>
        
                <div class="mb-3">
                    <label for="item_description" class="form-label">Description</label>
                    <textarea class="form-control" name="item_description" id="item_description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="date_surrendered" class="form-label">Date Surrendered</label>
                    <input type="date" class="form-control" name="date_surrendered" id="date_surrendered" required>
                </div>

                <div class="mb-3">
                    <label for="image_item" class="form-label">Image</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="item_image" class="box">
                </div>
                <input type="submit" class="btn btn-primary" name="Post" value="Post">
            </form>

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

            <section class="item-section">
                <div class="item-grid">
                    <div class="item-display">
                        <h2>List of Items</h2>
                        <div class="item-grid-container">
                            <?php
                            if (mysqli_num_rows($select) > 0) {
                                while ($row = mysqli_fetch_assoc($select)) {
                                    ?>
                                    <div class="item-card">
                                        <img src="uploaded_img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>">
                                        <h1 class="title">Item Name:<?php echo htmlspecialchars($row['item_name']); ?></h1>
                                        <div class="category">Category: <?php echo htmlspecialchars($row['item_category']); ?></div>
                                        <div class="description">Description: <?php echo htmlspecialchars($row['item_description']); ?></div>
                                        <div class="date">Date: <?php echo htmlspecialchars($row['date_surrendered']); ?></div>

                                        <div class="actions">
                                            <a href="found_edit.php?edit=<?php echo $row['id']; ?>" class="btn edit"> <i class="fas fa-edit"></i> Edit </a>
                                            <a href="found_items.php?delete=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fas fa-trash"></i> Delete </a>
                                            <a href="../users/found_display.php<?php echo $row['id']; ?>" class="btn view">View</a> </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p class="empty">No items posted yet.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Sidebar Toggle
    const burgerMenu = document.querySelector('.burger-menu');
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.overlay');

    burgerMenu.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        burgerMenu.querySelector('i').classList.toggle('fa-bars');
        burgerMenu.querySelector('i').classList.toggle('fa-times');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
          burgerMenu.querySelector('i').classList.add('fa-bars');
        burgerMenu.querySelector('i').classList.remove('fa-times');
    });

    // Dropdown Toggle
    document.querySelectorAll('.nav-item.has-treeview > .nav-link').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentNode;
            const subMenu = this.nextElementSibling;
            
            parent.classList.toggle('open');
            
            const icon = this.querySelector('.right');
            if (icon) {
                icon.classList.toggle('fa-angle-left');
                icon.classList.toggle('fa-angle-down');
            }
        });
    });

    function toggleOtherCategory(select) {
    var otherInput = document.getElementById('other_category');
    if (select.value === 'Others') {
        otherInput.style.display = 'block';
        otherInput.required = true;
    } else {
        otherInput.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
    }
}
</script>
</body>

</html>
