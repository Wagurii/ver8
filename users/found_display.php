<?php
require('../config/connection.php');
session_start();

$select = mysqli_query($connection, "SELECT * FROM found_items");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="found.css">
    <title>View Found Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .item-grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 80%;
            /* Added max-width to limit container width */
            margin: 0 auto;
            /* Center the container horizontally */
        }

        .item-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .item-card img {
            width: 100%;
            object-fit: contain;
            border-radius: 8px;
            max-height: 500px;
        }

        .item-card h3 {
            font-size: 1.2em;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .item-card .category {
            font-size: 0.9em;
            color: #555;
            margin-bottom: 10px;
        }

        .item-card .claim-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .item-card .claim-button:hover {
            background-color: #45a049;
        }

        #claimForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            z-index: 10;
            width: 400px;
            max-width: 90%;
            overflow-y: auto;
            max-height: 90vh;
        }

        #claimForm h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        #claimForm label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        #claimForm input[type="text"],
        #claimForm input[type="email"],
        #claimForm textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        #claimForm textarea {
            resize: none;
            height: 80px;
        }

        #claimForm button[type="submit"] {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        #claimForm button[type="submit"]:hover {
            background-color: #007ba7;
        }

        #claimForm .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #888;
        }

        #claimForm .close-button:hover {
            color: #333;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9;
        }
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


</head>

<body>
    <div class="container">
    <a href="../index.php" class="back-button">Back</a>
        <h2>Found Items</h2>
        <div class="item-grid-container">
            <?php
            if (mysqli_num_rows($select) > 0) {
                while ($row = mysqli_fetch_assoc($select)) {
            ?>
                    <div class="item-card">
                        <img src="../admin/uploaded_img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>">
                        <h3><?php echo htmlspecialchars($row['item_name']); ?></h3>
                        <div class="category">Category: <?php echo htmlspecialchars($row['item_category']); ?></div>
                        <button class="claim-button" onclick="showClaimForm(<?php echo $row['id']; ?>)">Claim</button>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">No items found.</p>';
            }
            ?>
        </div>
    </div>

    <div id="claimForm">
        <span class="close-button" onclick="hideClaimForm()">&times;</span>
        <h2>Claim Item</h2>
       <!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
  <form id="claimFormContent" action="../admin/process_claim.php" method="post">
    
    <input type="hidden" name="item_id" id="claimItemId">

    <div class="mb-3">
      <label for="student_id" class="form-label">Student/Staff ID</label>
      <input type="text" class="form-control" name="student_id" id="student_id" required>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Descriptions</label>
      <input type="text" class="form-control" name="description" id="description" required>
    </div>

    <div class="mb-3">
      <label for="last_seen" class="form-label">Last Seen</label>
      <input type="text" class="form-control" name="last_seen" id="last_seen" required>
    </div>

    <div class="mb-3">
      <label for="date_lost" class="form-label">Date of Lost</label>
      <input type="date" class="form-control" name="date_lost" id="date_lost" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit Claim</button>
  </form>
</div>

    </div>

    <div id="overlay"></div>

    <script>
        function showClaimForm(itemId) {
            document.getElementById("claimItemId").value = itemId;
            document.getElementById("claimForm").style.display = "block";
            document.getElementById("overlay").style.display = "block";
            document.body.style.overflow = 'hidden';
        }

        function hideClaimForm() {
            document.getElementById("claimForm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
            document.body.style.overflow = '';
        }
    </script>
</body>

</html>