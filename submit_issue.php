<?php
session_start();
include 'config.php';

if (!isset($_SESSION['usermail']) || !isset($_SESSION['user_id'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Session is not set.',
        'session_data' => $_SESSION 
    ]);
    exit;
}

if (empty($_POST['issue_type']) || empty($_POST['severity']) || empty($_POST['message'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Required fields missing.',
        'session_data' => $_SESSION 
    ]);
    exit;
}

$reported_by = $_SESSION['user_id'];
$usermail = $_SESSION['usermail'];
$issue_type = $_POST['issue_type'];
$guest_services = $_POST['guest_services'] ?? null;
$severity = $_POST['severity'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO issues (issue_type, guest_service, severity, message, reported_by, user_id, usermail) VALUES (?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    echo json_encode(['status' => 'error', 'message' => 'SQL prepare error: ' . $conn->error, 'session_data' => $_SESSION]);
    exit;
}


$stmt->bind_param('ssssiss', $issue_type, $guest_services, $severity, $message, $reported_by, $reported_by, $usermail);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Issue reported successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Execution error: ' . $stmt->error, 'session_data' => $_SESSION]);
}

$stmt->close();
$conn->close();
?>
