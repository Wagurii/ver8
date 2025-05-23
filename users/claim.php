<?php
require('../config/connection.php');
session_start();

$current_user_id = $_SESSION['id'];

$sql = "SELECT * FROM claims WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $current_user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>My Claims</title>
</head>
<style>
   .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #6c757d; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }
        .back-button:hover {
            background-color: #5a6268; 
        }
</style>
<body>
   <a href="../index.php" class="back-button">Back</a>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Student/Staff ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Last Seen</th>
      <th>Date Lost</th>
      <th>Claim Date</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["student_staff_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["last_seen"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["date_lost"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["claim_date"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["status"]) . "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No claims found.</td></tr>";
    }
    ?>
  </tbody>
</table>

</body>
</html>