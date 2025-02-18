<?php
include_once 'createinven.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="container mt-4">

<div class="container vh-100">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col col-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Inventory</h1>
                    <form action="createinven.php" method="POST">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label">Item Id <span class="text-danger">*</span></label>
                                <input type="text" name="item_id" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Part Name <span class="text-danger">*</span></label>
                                <input type="text" name="part_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <input type="text" name="category" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">In stock <span class="text-danger">*</span></label>
                                <input type="text" name="in_stock" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Arrival Date <span class="text-danger">*</span></label>
                                <input type="date" name="arrival_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Manager Id <span class="text-danger">*</span></label>
                                <input type="text" name="manager_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Original Price <span class="text-danger">*</span></label>
                                <input type="text" name="original_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-2 mt-3">
                            <div class="col-12 d-grid">
                                <button type="submit" class="btn btn-success btn-md">
                                    <i class="bi bi-save"></i> Save
                                </button>
                            </div>
                            <div class="col-12 d-grid">
                                <a href="index.php" class="btn btn-secondary btn-md">
                                    <i class="bi bi-arrow-left"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
