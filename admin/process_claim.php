<?php
@include '../config/connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $itemId = mysqli_real_escape_string($connection, $_POST['item_id']);
    $studentStaffId = mysqli_real_escape_string($connection, $_POST['student_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $lastSeen = mysqli_real_escape_string($connection, $_POST['last_seen']);
    $dateLost = mysqli_real_escape_string($connection, $_POST['date_lost']);
    $user_id = $_SESSION['id'];

    // Validate data
    if (empty($studentStaffId) || empty($name) || empty($description) || empty($lastSeen) || empty($dateLost)) {
        echo "<script>alert('All fields are required.'); window.location.href='found.php';</script>";
        exit();
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO claims (item_id, student_staff_id, name, description, last_seen, date_lost,user_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $insertQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $itemId, $studentStaffId, $name, $description, $lastSeen, $dateLost,$user_id);

        if (mysqli_stmt_execute($stmt)) {
            // Update found_items table to set status to claimed
            //check if the status exists.
            $checkStatusQuery = "SHOW COLUMNS FROM found_items LIKE 'status'";
            $statusResult = mysqli_query($connection, $checkStatusQuery);

            if (mysqli_num_rows($statusResult) > 0) {
                $updateQuery = "UPDATE found_items SET status = 'claimed' WHERE id = ?";
                $updateStmt = mysqli_prepare($connection, $updateQuery);

                if ($updateStmt) {
                    mysqli_stmt_bind_param($updateStmt, "s", $itemId);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);
                }
            }
            else{
                echo "<script>alert('The status column does not exist in the found_items table.'); window.location.href='../users/found_display.php';</script>";
                exit();
            }

            echo "<script>alert('Claim submitted successfully!'); window.location.href='../users/found_display.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
            echo "<script>alert('Failed to submit claim. Please try again.'); window.location.href='../users/found_display.php';</script>";
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
        echo "<script>alert('Database error.'); window.location.href='../users/found_display.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='../users/found_display.php';</script>";
    exit();
}

mysqli_close($connection);
?>
