<?php
include '../config/connection.php';
session_start();
$response = ['success'=>false];

if(isset($_POST['post_id'], $_POST['comment_content']) && isset($_SESSION['id'])){
    $post_id = intval($_POST['post_id']);
    $user_id = intval($_SESSION['id']);
    $comment = trim($_POST['comment_content']);
    if($comment !== ''){
        $stmt = $connection->prepare("INSERT INTO post_comments (post_id, user_id, comment_content) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $post_id, $user_id, $comment);
        if($stmt->execute()){
            $response['success'] = true;
        } else {
            $response['error'] = "Database error.";
        }
    } else {
        $response['error'] = "Empty comment.";
    }
} else {
    $response['error'] = "Missing data or not logged in.";
}
header('Content-Type: application/json');
echo json_encode($response);
?>