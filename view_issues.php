<?php
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM issues ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Type</th><th>Service</th><th>Severity</th><th>Message</th><th>Status</th><th>Reported By</th><th>Created At</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["issue_type"]. "</td><td>" . $row["guest_service"]. "</td><td>" . $row["severity"]. "</td><td>" . $row["message"]. "</td><td>" . $row["status"]. "</td><td>" . $row["reported_by"]. "</td><td>" . $row["created_at"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
