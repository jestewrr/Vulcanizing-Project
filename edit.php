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
    $sql = "SELECT * FROM inventory WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $part_name = $_POST['part_name'];
    $category = $_POST['category'];
    $in_stock = $_POST['in_stock'];
    $arrival_date = $_POST['arrival_date'];
    $manager_id = $_POST['manager_id'];
    $original_price = $_POST['original_price'];
    
    $sql = "UPDATE inventory SET part_name=?, category=?, in_stock=?, arrival_date=?, manager_id=?, original_price=? WHERE item_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $part_name, $category, $in_stock, $arrival_date, $manager_id, $original_price, $item_id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Edit Inventory</h2>
    <form method="post">
        <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item['item_id']); ?>">
        <div class="mb-3">
            <label class="form-label">Part Name</label>
            <input type="text" name="part_name" class="form-control" value="<?php echo htmlspecialchars($item['part_name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?php echo htmlspecialchars($item['category']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">In Stock</label>
            <input type="number" name="in_stock" class="form-control" value="<?php echo htmlspecialchars($item['in_stock']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Arrival Date</label>
            <input type="date" name="arrival_date" class="form-control" value="<?php echo htmlspecialchars($item['arrival_date']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Manager ID</label>
            <input type="text" name="manager_id" class="form-control" value="<?php echo htmlspecialchars($item['manager_id']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Original Price</label>
            <input type="number" name="original_price" class="form-control" value="<?php echo htmlspecialchars($item['original_price']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
