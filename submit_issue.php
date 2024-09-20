<?php
include 'config.php';
session_start(); 

echo "Session ID: " . session_id() . "<br>";
print_r($_SESSION);

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in', 'session' => $_SESSION]);
    exit;
}

$reported_by = $_SESSION['user_id'];

$issue_type = $_POST['issue_type'];
$guest_services = $_POST['guest_services'] ?? NULL;
$severity = $_POST['severity'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO issues (issue_type, guest_service, severity, message, reported_by) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $issue_type, $guest_services, $severity, $message, $reported_by);


if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
