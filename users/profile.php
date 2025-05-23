<?php
require('../config/connection.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$username = $_SESSION['username'];
$message = '';

// Handle password change
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user['password'] === $current_password) { 
        // Check if new passwords match
        if ($new_password === $confirm_password) {

            // Update password
            $update_sql = "UPDATE users SET password = ? WHERE username = ?";
            $update_stmt = $connection->prepare($update_sql);
            $update_stmt->bind_param('ss', $new_password, $username);
            
            
            if ($update_stmt->execute()) {
                $message = '<div class="alert success">Password updated successfully!</div>';
            } else {
                $message = '<div class="alert error">Error updating password!</div>';
            }
            $update_stmt->close();
        } else {
            $message = '<div class="alert error">New passwords do not match!</div>';
        }
    } else {
        $message = '<div class="alert error">Current password is incorrect!</div>';
    }
}

if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = 'uploads/';
    $temp_name = $_FILES['profile_image']['tmp_name'];
    $file_name = $username . '_' . time() . '_' . $_FILES['profile_image']['name'];
    
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    if (move_uploaded_file($temp_name, $upload_dir . $file_name)) {
        $update_img_sql = "UPDATE users SET profile_image = ? WHERE username = ?";
        $update_img_stmt = $connection->prepare($update_img_sql);
        $profile_image_path = $upload_dir . $file_name;
        $update_img_stmt->bind_param('ss', $profile_image_path, $username);
        
        if ($update_img_stmt->execute()) {
            $message = '<div class="alert success">Profile image updated successfully!</div>';
        } else {
            $message = '<div class="alert error">Error updating profile image!</div>';
        }
        $update_img_stmt->close();
    } else {
        $message = '<div class="alert error">Error uploading image!</div>';
    }
}

// Get user data
$sql = 'SELECT * FROM users WHERE username = ?';
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    die('Error preparing statement: ' . $connection->error);
}
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "No user found with this username.";
    exit();
}

$stmt->close();
$connection->close();

// Default profile image if none exists
$profile_image = isset($user_data['profile_image']) && !empty($user_data['profile_image']) 
    ? $user_data['profile_image'] 
    : "uploads/avatar.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .back-button {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 16px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
        }
        
        .back-button:hover {
            color: #007bff;
        }
        
        .back-button i {
            margin-right: 5px;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .card-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .card-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 0;
            color: #333;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        
        .profile-image {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            padding: 5px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .profile-image-overlay:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        .profile-image-overlay i {
            color: white;
        }
        
        .profile-name {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }
        
        .profile-username {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }
        
        .profile-info {
            width: 100%;
        }
        
        .info-item {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            width: 150px;
            color: #555;
        }
        
        .info-value {
            flex: 1;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.1s;
            border: none;
            outline: none;
        }
        
        .btn:hover {
            transform: translateY(-1px);
        }
        
        .btn:active {
            transform: translateY(1px);
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0069d9;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        /* Modal for changing password */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            max-width: 90%;
            animation: modalFadeIn 0.3s ease-out forwards;
        }
        
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
        }
        
        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }
        
        .close-modal {
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
            color: #777;
            transition: color 0.3s;
        }
        
        .close-modal:hover {
            color: #333;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }
        
        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .file-input {
            display: none;
        }
        
        @media (max-width: 768px) {
            .profile-section {
                padding: 15px;
            }
            
            .profile-image {
                width: 120px;
                height: 120px;
            }
            
            .profile-name {
                font-size: 20px;
            }
            
            .info-label {
                width: 120px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="../Posting.php" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Posts
            </a>
            <form action="../logout.php" method="POST" style="margin: 0;">
                <button type="submit" name="logout" class="btn btn-secondary">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
        
        <?php echo $message; ?>
        
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">User Profile</h1>
            </div>
            <div class="card-body">
                <div class="profile-section">
                    <div class="profile-image">
                        <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Profile Picture">
                        <div class="profile-image-overlay" onclick="document.getElementById('profile-image-upload').click()">
                            <i class="fas fa-camera"></i>
                        </div>
                        <form id="profile-image-form" method="POST" enctype="multipart/form-data">
                            <input type="file" id="profile-image-upload" name="profile_image" class="file-input" onchange="document.getElementById('profile-image-form').submit()">
                        </form>
                    </div>
                    
                    <h2 class="profile-name"><?php echo htmlspecialchars($user_data['firstname'] . ' ' . $user_data['lastname']); ?></h2>
                    <p class="profile-username">@<?php echo htmlspecialchars($user_data['user_type']); ?></p>
                    
                    <div class="profile-info">
                        <div class="info-item">
                            <div class="info-label">First Name:</div>
                            <div class="info-value"><?php echo htmlspecialchars($user_data['firstname']); ?></div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Last Name:</div>
                            <div class="info-value"><?php echo htmlspecialchars($user_data['lastname']); ?></div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Middle Name:</div>
                            <div class="info-value"><?php echo htmlspecialchars($user_data['middlename']); ?></div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Username:</div>
                            <div class="info-value"><?php echo htmlspecialchars($user_data['username']); ?></div>
                        </div>
                        
                        <?php if(isset($user_data['course']) && !empty($user_data['course'])): ?>
                        <div class="info-item">
                            <div class="info-label">Course:</div>
                            <div class="info-value"><?php echo htmlspecialchars($user_data['course']); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="action-buttons">
                        <button id="change-password-btn" class="btn btn-primary">
                            <i class="fas fa-key"></i> Change Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Change Password Modal -->
    <div class="modal" id="password-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Change Password</h3>
                <button class="close-modal" id="close-modal">&times;</button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="confirm_password">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                    <button type="submit" name="change_password" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Modal functionality
        const modal = document.getElementById('password-modal');
        const changePasswordBtn = document.getElementById('change-password-btn');
        const closeModal = document.getElementById('close-modal');
        const cancelBtn = document.getElementById('cancel-btn');
        
        changePasswordBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });
        
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        
        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
</body>
</html>