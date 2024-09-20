<?php
$conn = new mysqli($servername, $username, $password, $dbname);

$issue_id = $_POST['issue_id'];
$assigned_to = $_POST['assigned_to'];

$sql = "UPDATE issues SET assigned_to = ?, status = 'In Progress' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $assigned_to, $issue_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
