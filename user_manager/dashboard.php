<?php
require('../config/connection.php');

session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'User Manager') {
  header("location: login.php");
  exit();
}

if ($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'User Manager') {
    echo '<h1 style = "text-align: center;";>ERROR 404</h1>';
    die("Access denied: You do not have permission to access this page.");
}

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
    <title>Admin Page</title>
</head>
<style>
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #343a40;
      padding-top: 20px;
    }
    .sidebar a {
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
    }
    .sidebar a:hover {
      background-color: #575757;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
    }
    
    .btn-toggle{
      padding: 10px 95px;
      background-color: #343a40;
    }.custom-end{
      width: 200px;
    }
  </style>
<body>
    
     <!-- Sidebar -->
  <div class="sidebar text-center">
    <h2 class="text-white text-center"><?php echo ucfirst($_SESSION['user_type'])?></h2>
    <a href="#">Dashboard</a>

   
    <a href="systemLogs.php">System Logs</a>
  </div>

  <!-- Main content -->
  <div class="content">

    <h1>FOUND</h1>
     <a href="../posting.php">back</a>

     <form action="dashboard.php" method="POST" enctype="multipart/form-data">
        <br>
          <label>Item</label>
         <input type="text" name="item">
         <br>
         <br>
         <label>Image</label>
         <input type="file" name="image">
         <br>
         <br>
         <input type="submit" name="submit">

      
     </form>
  </div>

  <!-- Bootstrap JS and Popper.js (optional for dropdowns, tooltips) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>