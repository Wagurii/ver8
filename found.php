<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Page</title>
</head>
<body>
    <h1>Found Page</h1>
    <!-- Content for found page goes here -->
</body>
</html>