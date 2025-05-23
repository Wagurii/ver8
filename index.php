<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/bootstrap-utilities.min.css">
    <title>Lost and Found</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; 
            margin: 0;
            background-color: #4a3c5e;
            font-family: Arial, sans-serif;
            padding: 10px; 
            box-sizing: border-box; 
        }

        .card-container {
            display: flex;
            gap: 10px;
            /* flex-wrap: wrap; 
            justify-content: center; */
            max-width: 1000px; 
            width: 100%; 
        }

        .card {
            width: 450px;
            height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 3px solid #000;
            border-radius: 10px;
            color: #000;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            transition: transform 0.2s ease-in-out; 
            margin: 10px; 
            box-sizing: border-box; /
        }

        .card:hover {
            transform: scale(1.05);
        }

        .lost-card {
            background-color: #ff4040;
        }

        .found-card {
            background-color: #40c4c4;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        /* Larger Screens */
        @media (min-width: 1200px) {
            .card {
                width: 500px; 
                height: 500px;
                font-size: 24px; 
            }

            .icon {
                font-size: 50px; 
            }
        }

        /* Tablets and Medium Screens */
        @media (max-width: 768px) {
            .card {
                width: 300px; 
                height: 300px;
                font-size: 18px; 
            }

            .card-container {
                gap: 20px; 
                flex-wrap: wrap; 
                justify-content: center;
            }

            .icon {
                font-size: 35px; 
            }
        }

        @media (max-width: 480px) {
            .card {
                width: 90%; 
                max-width: 350px; 
                height: 200px; 
                font-size: 16px; 
            }

            .icon {
                font-size: 30px; 
            }

            .card-container {
                gap: 15px; 
            }
        }

        
        @media (max-width: 360px) {
            .card {
                height: 180px; 
                font-size: 14px;
            }

            .icon {
                font-size: 25px; 
            }
        }

        @media (hover: none) {
            .card:hover {
                transform: none; 
            }

            .card:active {
                transform: scale(0.95); 
            }
        }
    </style>
</head>
<body>

    <div class="card-container">
        <form action="logout.php" method="POST" style="margin: 0;">
                    <button type="submit" name="logout" class="btn btn-secondary">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
        <a href="posting.php" class="card lost-card">
            <span class="icon">🚶‍♂️</span>
            Lost
        </a>
        <a href="users/found_display.php" class="card found-card">
            <span class="icon">🔍</span>
            Found
        </a>

        <a href="users/claim.php" class="card found-card">
            <span class="icon">📩</span>
            Claim
        </a>
    </div>
</body>
</html>