<?php
session_start();
echo $_SESSION['username'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>
<style>
      .registration-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
</style>
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
                    <a href="administrator.php" class="nav-link page-active">
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
        <div class="registration-container">
            <h2 class="mb-4 text-center">Register New User</h2>
            <form id="registrationForm" action="process_registration.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required minlength="3" maxlength="50" placeholder="Enter a unique username">
                    <div class="invalid-feedback">
                        Please provide a username (3-50 characters).
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8" placeholder="Enter password">
                    <div class="invalid-feedback">
                        Password must be at least 8 characters long.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm password">
                    <div class="invalid-feedback">
                        Passwords do not match.
                    </div>
                </div>

                <hr class="my-4">

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required maxlength="100" placeholder="Enter first name">
                    <div class="invalid-feedback">
                        Please provide a first name.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="middle_name" class="form-label">Middle Name (Optional)</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" maxlength="100" placeholder="Enter middle name (optional)">
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required maxlength="100" placeholder="Enter last name">
                    <div class="invalid-feedback">
                        Please provide a last name.
                    </div>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label">Select Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="" disabled selected>Choose role...</option>
                        <option value="admin">Admin</option>
                        <option value="user_manager">User Manager</option>
                        </select>
                    <div class="invalid-feedback">
                        Please select a role.
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Register User</button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                </div>
            </form>
        </div>
   
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


      document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registrationForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');

            function validatePasswordMatch() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords do not match.");
                } else {
                    confirmPassword.setCustomValidity(''); 
                }
            }

            password.addEventListener('change', validatePasswordMatch);
            confirmPassword.addEventListener('keyup', validatePasswordMatch); 

            form.addEventListener('submit', function (event) {
                // Ensure all custom validations are run before submitting
                validatePasswordMatch();

                if (!form.checkValidity()) {
                    event.preventDefault(); // Prevent form submission if invalid
                    event.stopPropagation();
                }
                form.classList.add('was-validated'); // Add class to show Bootstrap validation styles
            }, false);
        });
</script>

</body>
</html>