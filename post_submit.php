    <?php
    require('config/connection.php');
    session_start();

    if (!isset($_SESSION['id'])) {
        die("You must be logged in to post.");
    }

    $username = $_SESSION['username'];

 
    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        // echo 'connected';
    }
    if(isset($_POST['submit'])){
    $post_content = $_POST['post_content']; 
    $username = $_SESSION['username']; 
    $fileName = $_FILES['image']['name'];
    $ext = pathinfo($fileName,PATHINFO_EXTENSION);
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif','jfif');
    $tempName =  $_FILES['image']['tmp_name'];
    $targetPath = "uploads/".$fileName;
    $post_content = mysqli_real_escape_string($connection, $post_content);
    $_SESSION['success_message'];
    $userId = $_SESSION['id'];
    if(!empty($fileName)){
      if(in_array($ext,$allowedTypes)){
        if(move_uploaded_file($tempName , $targetPath)){
        $sql = "INSERT INTO posts (username, post_content, images, user_id) VALUES ('$username', '$post_content', '$fileName', $userId)";
        if(mysqli_query($connection,$sql)){
            
            header('location: posting.php');
        }else{
            '<script>
                alert("something wrong");
                window.location.href = "posting.php";
            </script>';
      
            
        }
        }else{
           
            '<script>
              alert("file is not uploaded");
              window.location.href = "posting.php";
             </script>';
        
        }
    }else{
        echo '<script>
              alert("File is not allowed");
              window.location.href = "posting.php";
             </script>';

    }
    }else{
        // No image uploaded, only post content
        $sql = "INSERT INTO posts (username, post_content, user_id) VALUES ('$username', '$post_content',   $userId)";
        if (mysqli_query($connection, $sql)) {
            $_SESSION['success_message'] = '<div class="container alert alert-success p-3" role="alert">
            Successfully posted!
            
        </div>';
            header('location: posting.php');
        } else {
            echo 'Something went wrong with text-only post';
        }
    }
    }

    // echo $fileName;
    // $sql = "INSERT INTO posts (username, post_content) VALUES (?, ?)";
    // $stmt = $connection->prepare($sql);
    // $stmt->bind_param("ss", $username, $post_content,);

    // if ($stmt->execute()) {
    //     echo "Post submitted successfully!";
    //     header('location: posting.php');
    // } else {
    //     echo "Error: " . $stmt->error;
    // }
    // // Close connection
    // $stmt->close();  
    $connection->close();


    ?>
