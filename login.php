<?php
    require('config/connection.php');
    session_start();
    
     if (isset($_SESSION['id'])) {
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin')  {
            header("location: admin/dashboard.php");
            exit();
        } else {
            header("location: index.php");
            exit();
        }
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        if (empty($username) || empty($password)) {
            //echo 'fill up all fields';
        } else {
            $queryValidate = "SELECT * FROM users WHERE username = ? AND password = ?"; 
            $stmt = $connection->prepare($queryValidate);
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) { 
                
            $result = $stmt->get_result();
            
                if (mysqli_num_rows($result) > 0) {
                    $rowValidate = mysqli_fetch_assoc($result);
                    $_SESSION['id'] = $rowValidate['id'];
                    $_SESSION['user_type'] = $rowValidate['user_type'];
                    $_SESSION['username'] = $rowValidate['username'];
                    
                    // echo "Username: " . $rowValidate['username'] . "<br>";
                    // echo "Password: " . $rowValidate['password'] . "<br>";
                    // $_SESSION['status'] = 'online';
                   
                   
                    $first_name = $rowValidate['firstname'];
                    $last_name = $rowValidate['lastname'];
                    $status_activity_log = 'login';
                    date_default_timezone_set('Asia/Manila');
                    $date_activity = date("Y-m-d h:i:s A");
                    $message = $_SESSION['user_type'] . ': ' . $first_name . ' ' . $last_name . ' | LOGIN';
            
            
                    // Log activity to the database
            if ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'User Manager') {
                $sql_system_logs = "INSERT INTO activity_log (`message`, `date`,`status`) VALUES (?,?,?)";
                $query_system_logs = $connection->prepare($sql_system_logs) or die ($connection->error);
                $query_system_logs->bind_param('sss', $message, $date_activity, $status_activity_log);
                $query_system_logs->execute();
                $query_system_logs->close();
        
                }
                              
                    
              if ($_SESSION['user_type'] == 'admin') {
                        header("location: admin/dashboard.php");
                }elseif($_SESSION['user_type'] == 'User Manager'){
                        header("location: user_manager/dashboard.php");
                    } else {
                        header("location: index.php");
                        exit();
                    }
                   
                } 
                    //echo "Login Successfully";
                    
                  else {
                    $_SESSION['status'] = 'invalid';
                   // echo "Invalid credentials";
                }
            } else {    
                //echo "Error executing";
            }
        }
    }
    
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>log in</title>
    </head>
    <style>
        body {
            background-color: #4a3c5e;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: black;
        }
        .container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(109, 40, 217, 0.15);
            width: 100%;
            max-width: 420px;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, #8b5cf6, #d8b4fe);
        }
        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: 0.5px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
        }
        label {
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
        }
        input[type="text"],
        input[type="password"] {
            padding: 0.875rem;
            border: 1px solid #d8b4fe;
            border-radius: 0.5rem;
            font-size: 1rem;
            background: #f5f3ff;
            transition: all 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #8b5cf6;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.2);
        }
        button {
            background: linear-gradient(to right, #8b5cf6, #a78bfa);
            color: #ffffff;
            padding: 0.875rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background: linear-gradient(to right, #7c3aed, #9333ea);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
        }
        button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.4);
        }
        button:active {
            transform: translateY(0);
        }
        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
<body>
    <div class="container">
        <h2>Lost & Found System</h2>
        <form class="form-group" action="login.php" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>
    </body>

    </html>