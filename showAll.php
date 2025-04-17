<?php include 'header.php'; ?>

<h1>All Records</h1>

<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'Dhruv@1373', 'final');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM string_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="record">';
        echo "<strong>ID:</strong> " . $row["string_id"]. " - <strong>Message:</strong> " . $row["message"];
        echo '</div>';
    }
} else {
    echo "<p>No records found.</p>";
}

if (isset($_POST['delete'])) {
    $string_id = $_POST['string_id'];
    
    $stmt = $conn->prepare("DELETE FROM string_info WHERE string_id = ?");
    $stmt->bind_param("i", $string_id);
    
    if ($stmt->execute()) {
        echo '<p class="success">Record deleted successfully. Refreshing...</p>';
        echo "<meta http-equiv='refresh' content='2'>";
    } else {
        echo "<p>Error deleting record: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
}
?>

<h2>Delete Record</h2>
<form action="showAll.php" method="post">
    <label for="string_id">Enter ID to delete:</label>
    <input type="number" id="string_id" name="string_id" required>
    <input type="submit" name="delete" value="Delete">
</form>

<br>
<a href="index.php">← Back to input form</a>

<?php include 'footer.php'; ?>