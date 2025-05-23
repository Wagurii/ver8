<?php
header('Content-Type: application/json');
require('../config/connection.php');
session_start();


if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['id'];

$input = json_decode(file_get_contents('php://input'), true);
$post_id = isset($input['post_id']) ? intval($input['post_id']) : null;

if (!$post_id) {
    echo json_encode(['success' => false, 'error' => 'Invalid post ID']);
    exit;
}

try {
    $sql = "SELECT user_id FROM posts WHERE post_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'error' => 'Post not found']);
        exit;
    }

    $post = $result->fetch_assoc();
    if ($post['user_id'] != $user_id) {
        echo json_encode(['success' => false, 'error' => 'Unauthorized action']);
        exit;
    }

    // Delete the post
    $sql = "DELETE FROM posts WHERE post_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $post_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete post']);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Server error: ' . $e->getMessage()]);
}

$connection->close();
?>