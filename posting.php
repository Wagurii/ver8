<?php
require('post_submit.php');
// session_start();

if (!isset($_SESSION['id'])) {
    header("location:login.php");
    exit(); 
    
}
// echo 'Session: '. $_SESSION['status'];
// echo "<br>";
// echo 'username'.  $_SESSION['username'] ;
// Retrieve and display the success message if it exists in the session

?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posting Area</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/bootstrap-utilities.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
  <style>
  .fade-out {
      opacity: 0;
      transition: opacity 1s ease-in-out; 
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
        .post-options {
        float: right;
}


  </style>
<body>
     <div class="header">
        <div class="profile-icon">
          <a href="users/profile.php">
            <i class="fas fa-user-circle"></i
          ></a> 
        </div>
    </div>
  
  
        <h1>Posting Area</h1>
       <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="Logout">
   
    </form>
    <div id="success-message-container">
        <?php
        if (isset($_SESSION['success_message'])) {
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        }
        ?>
    </div>
    <div class="container">
    <a href="index.php" class="back-button">Back</a>
        <!-- <h1>User Posting Area</h1> -->
    <form id="postForm" action="post_submit.php" method="POST" enctype="multipart/form-data">
    <div class="create-post">
        <div class="create-post-header">Want to post something?</div>
        <textarea class="post-input" placeholder="What's on your mind?" name="post_content" rows="5"></textarea>
        <label for="post_image">Upload Image (optional):</label>
        <input type="file" id="image" name="image">
        <button class="post-button" type="submit" name="submit">Post</button>
        <div style="clear: both;"></div>
    </div>

         </form>
      
        <div id="postsContainer" data-aos="zoom-in">
             
            <!-- 
                 All posts are displayed here.
            -->
                 
         </div>

         
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
        const currentUserId = <?php echo isset($_SESSION['id']) ? json_encode($_SESSION['id']) : 'null'; ?>;
             console.log(currentUserId)
    AOS.init();

    document.addEventListener('DOMContentLoaded', function() {
        const successMessageContainer = document.getElementById('success-message-container');
        const successMessage = successMessageContainer.querySelector('.alert-success');
          
        if (successMessage) {
        //  successMessage.style.padding = "10px";    
            setTimeout(function() {
                successMessage.classList.add('fade-out');
                setTimeout(function() {
                    successMessageContainer.innerHTML = '';
                }, 1000); 
            }, 3000); 
        }
    });
    
document.addEventListener('click', function(e) {
  if (e.target.matches('.dropdown-item')) {
    e.preventDefault();
  }
}, false);
  </script>
</body>
</html>

