<?php
$connection = mysqli_connect("localhost", "root", "", "projectdb");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['ProductCategory'];
    $sortOption = $_POST['sortOption'];
    $productStock = $_POST['ProductStock'];

    $sql = "SELECT * FROM tbl_product JOIN tbl_product_category ON tbl_product.category_id=tbl_product_category.category_id WHERE 1=1";

    if (!empty($category)) {
        $sql .= " AND tbl_product_category.category_name = '$category'";
    }
    if (!empty($productStock)) {
        $sql .= " AND tbl_product.stock = '$productStock'";
    }
    if (!empty($sortOption)) {
        if ($sortOption === 'price-status-asc') {
            $sql .= " ORDER BY tbl_product.product_price ASC";
        } elseif ($sortOption === 'price-status-desc') {
            $sql .= " ORDER BY tbl_product.product_price DESC";
        }
    }

    $query = mysqli_query($connection, $sql);
} else {
    // Default query
    $query = mysqli_query($connection, "SELECT * FROM tbl_product JOIN tbl_product_category ON tbl_product.category_id=tbl_product_category.category_id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/report.css" />
</head>

<body>
    <div class="container">
        <div class="card-header">
            <h2 class="card-title">Filter</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-3 product_category">
                        <select name="ProductCategory" class="form-select text-capitalize" fdprocessedid="enmacn">
                            <option value="">Category</option>
                            <?php
                            $category_query = mysqli_query($connection, "SELECT * FROM `tbl_product_category`");
                            while ($category = mysqli_fetch_array($category_query)) {
                                echo "<option value='{$category['category_name']}'>{$category['category_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sortOption" class="form-select">
                            <option value="">Sort By</option>
                            <option value="price-status-asc">Price (Low to High)</option>
                            <option value="price-status-desc">Price (High to Low)</option>
                        </select>
                    </div>
                    <div class="col-md-3 product_stock">
                        <select name="ProductStock" class="form-select text-capitalize" fdprocessedid="9ja308">
                            <option value=""> Stock </option>
                            <option value="Out of stock">Out of stock</option>
                            <option value="In stock">In stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#9055fd">Apply changes</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Header -->
        <div class="header">
            <h2 class="title">Product Report</h2>
            <div class="subtitle">Date <?php echo date('Y-m-d'); ?></div>
        </div>
        <!-- /Header -->

        <!-- Content -->
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>Product name</th>
                        <th>Category</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-1">
                    <?php
                    while ($products = mysqli_fetch_array($query)) {
                        echo "<tr>
                                    <td>#{$products['product_id']}</td>
                                    <td>{$products['product_name']}</td>
                                    <td>{$products['category_name']}</td>
                                    <td>{$products['product_quantity']}</td>
                                    <td>{$products['product_price']}</td>
                                    <td>{$products['stock']}</td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="report-content">

        </div>
        <!-- /Content -->

        <!-- Footer -->
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Glam salon. All rights reserved.</p>
        </div>
        <!-- /Footer -->

        <!-- Buttons -->
        <div class="row" style="padding-top: 2rem; padding-bottom: 5rem;">
            <div class="col-md-6">
                <button class="btn btn-primary" onclick="window.print();">Print Report</button>
            </div>
            <div class="col-md-6 text-end">
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
        <!-- /Buttons -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>