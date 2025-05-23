<?php

session_start();


if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'online') {
    die('Please login first');
}


?>
<style>
  .profile-pic{
    background: darkseagreen;
    color: #eeeeee;
    border-radius: 50%;
    height: 60px;
    width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
    -webkit-box-shadow: 0 3px 5px rgb(54 60 241);
    box-shadow: 0 3px 5px rgb(54 60 241);
  }
</style>
<?php

function getProfilePicture($name){
  $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
  return '<div class="profile-pic">'.$initials.'</div>';
}
?>
<?php
require('config/connection.php');

$username = $_SESSION['username'];
// echo $_SESSION['status'];
// echo "<br>";
// echo $_SESSION['username'];

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


    // echo "User Information:<br>";
    // echo "Username: " . $user_data['username'] . "<br>";
    // echo "Password: " . $user_data['password'] . "<br>";

} else {
    echo "No user found with this username.";
}


$stmt->close();
 echo getProfilePicture( $user_data['password']);?>
<br>
<?php echo getProfilePicture('Christiano Ronaldo');?>
<br>
<?php echo getProfilePicture('Donald Trump');?>