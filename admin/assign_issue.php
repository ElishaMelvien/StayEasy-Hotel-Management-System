<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['issue_type'])) {
    $issueType = $_GET['issue_type'];
    
    $sql = "SELECT id, name, work AS role FROM staff";
    $result = mysqli_query($conn, $sql);

    $staffMembers = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $staffMembers[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'role' => $row['role']
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($staffMembers);
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['issueId']) && isset($data['staffId'])) {
        $issueId = $data['issueId'];
        $staffId = $data['staffId'];

        $staffSql = "SELECT name FROM staff WHERE id = ?";
        $staffStmt = $conn->prepare($staffSql);
        $staffStmt->bind_param("i", $staffId);
        $staffStmt->execute();
        $staffStmt->bind_result($staffName);
        $staffStmt->fetch();
        $staffStmt->close();

        if (!$staffName) {
            echo json_encode(['success' => false, 'message' => 'Staff member not found.']);
            exit;
        }

        $sql = "UPDATE issues SET assigned_to = ?, status = 'In Progress' WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $staffName, $issueId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'staffName' => $staffName]); 
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to assign issue.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
}
?>
