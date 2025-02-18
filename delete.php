<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "it6projecttest";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    
    $sql = "DELETE FROM inventory WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $item_id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>
