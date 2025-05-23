<?php
require('../config/connection.php');
session_start();

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header("location: ../login.php");
    exit();
}
$limit = 10; // Number of logs per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total number of logs
$total_sql = "SELECT COUNT(*) FROM activity_log";
$total_stmt = $connection->prepare($total_sql) or die ($connection->error);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);
$total_stmt->close();

// Fetch logs
$sql_system_logs = "SELECT message, date, status FROM activity_log ORDER BY date DESC LIMIT ?, ?";
$stmt = $connection->prepare($sql_system_logs) or die ($connection->error);
$stmt->bind_param('ii', $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
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
            <a href="systemLogs.php" class="nav-link page-active">
                <i class="nav-icon fas fa-history"></i>
                <span>System Logs</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Content -->
    <div class="content">

        <h1>System Logs</h1>
        <a href="../posting.php">back</a>

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No activity logs found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($total_pages > 1): ?>
                    <?php if ($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>

    </div>

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