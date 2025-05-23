<?php
require('../config/connection.php');

session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("location: ../login.php");
    exit();
}

// If the code reaches this point, the user is logged in and is an admin

// if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'User Manager') {
//     echo '<h1 style = "text-align: center;";>ERROR 404</h1>';
//     die("Access denied: You do not have permission to access this page.");
// }

if(isset($_POST['submit'])){
    $items = $_POST['item'];

    $fileName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $targetPath = "../uploads/".$fileName;
    $ext = pathinfo($fileName, PATHINFO_EXTENSION); // Get the file extension
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'jfif'); // Allowed file types
    $items = mysqli_real_escape_string($connection, $items);


    if(!empty($items) && !empty($fileName)) {
        if (in_array($ext, $allowedTypes)) {
            if (move_uploaded_file($tempName, $targetPath)) {
                $sql = "INSERT INTO found (items, images) VALUES (?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ss", $items, $fileName);
                if ($stmt->execute()) {
                    header('Location: dashboard.php');
                    exit(); 
                } else {
                    echo 'Error executing query: ' . $stmt->error;
                }
            } else {
                echo 'Error uploading file.';
            }
        } else {
            echo "File type not supported. Only JPG, JPEG, PNG, GIF, and JFIF are allowed.";
        }
    }  else {
        echo "<h1>Please insert some description or images.</h1>";
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <title>Admin Page</title>
    
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
            <a href="dashboard.php" class="nav-link page-active">
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
            <a href="found_items.php" class="nav-link">
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

<!-- Main Content -->
<div class="content">
    <div class="card"><h1>ON GOING</h1></div>
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
</script>

</body>
</html>