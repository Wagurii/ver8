<?php
require('../config/connection.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['post_id']) || !isset($data['post_content'])) {
    echo json_encode(["success" => false, "error" => "Missing post_id or post_content"]);
    exit;
}

$postId = $data['post_id'];
$postContent = $data['post_content'];

$sql = $connection->prepare("UPDATE posts SET post_content = ? WHERE post_id = ?");
$sql->bind_param("si", $postContent, $postId);

if ($sql->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $sql->error]);
}
?>
