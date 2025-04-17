<?php
// Database connection
$conn = new mysqli('localhost', 'root', 'Dhruv@1373', 'final');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    
    $stmt = $conn->prepare("INSERT INTO string_info (message) VALUES (?)");
    $stmt->bind_param("s", $message);
    
    if ($stmt->execute()) {
        header("Location: index.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>