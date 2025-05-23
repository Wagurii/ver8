<?php 
include_once 'config/connection.php';
session_start();

    // if ($_SESSION['user_type'] == 'admin') {
    //     $user_type_log = 'ADMIN';
    // } elseif ($_SESSION['user_type'] == 'user_manager') {
    //     $user_type_log = 'USER MANAGER';
    // }
    
        // Fetch user details from the database
        $sql_user = "SELECT firstname, lastname FROM users WHERE id = ?";
        $stmt_user = $connection->prepare($sql_user);
        $stmt_user->bind_param('s', $_SESSION['id']);
        $stmt_user->execute();  
        $result_user = $stmt_user->get_result();
        $row_user = $result_user->fetch_assoc();
        $first_name = $row_user['firstname'];
        $last_name = $row_user['lastname'];
        $status_activity_log = 'logout';
        date_default_timezone_set('Asia/Manila');
        $date_activity = date("Y-m-d H:i:s");
        $message = $_SESSION['user_type'] . ': ' . $first_name . ' ' . $last_name . ' | LOGOUT';


        
        if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'User Manager') {
        $sql_system_logs = "INSERT INTO activity_log (`message`, `date`,`status`) VALUES (?,?,?)";
        $query_system_logs = $connection->prepare($sql_system_logs) or die ($connection->error);
        $query_system_logs->bind_param('sss', $message, $date_activity, $status_activity_log);
        $query_system_logs->execute();
        $query_system_logs->close();

        }
                   

        unset($_SESSION['id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['username']);
        session_unset();
        session_destroy();
        echo '<script>window.location.href="login.php";</script>';
?>
