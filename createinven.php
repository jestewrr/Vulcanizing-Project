<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "it6projecttest";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_id = $_POST['item_id'];
        $part_name = $_POST['part_name'];
        $category = $_POST['category'];
        $in_stock = $_POST['in_stock'];
        $arrival_date = $_POST['arrival_date'];
        $manager_id = $_POST['manager_id'];
        $original_price = $_POST['original_price'];

        if (empty($item_id) || empty($part_name) || empty($category) || empty($in_stock) || empty($arrival_date) || empty($manager_id) || empty($original_price)) {
            die("Error: All fields are required.");
        }

        $sql = "INSERT INTO inventory (item_id, part_name, category, in_stock, arrival_date, manager_id, original_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("SQL Error: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $item_id, $part_name, $category, $in_stock, $arrival_date, $manager_id, $original_price);

        
        if (!$stmt->execute()) {
            die("SQL Execution Error: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();

        
        header("Location: index.php");
        exit();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
