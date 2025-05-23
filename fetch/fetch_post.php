<?php
require('../config/connection.php');


if ($connection->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $connection->connect_error]));
}


$sql =$connection->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$sql->execute();
$result = $sql->get_result();
$posts = [];

while($row = $result->fetch_assoc()){
    $posts [] = $row;
}
header('Content-Type: application/json');
echo json_encode($posts,JSON_PRETTY_PRINT);

?>  