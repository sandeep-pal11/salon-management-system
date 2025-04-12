<?php
$connection = mysqli_connect("localhost", "root", "", "projectdb");

// Initialize variables to store filter values
$paymentStatus = '';
$orderStatus = '';
$date = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve filter values from the form
    $paymentStatus = $_POST['paymentStatus'];
    $orderStatus = $_POST['orderStatus'];
    $date = $_POST['date'];

    // Construct SQL query based on filter values
    $sql = "SELECT * FROM tbl_order WHERE 1=1";
    if (!empty($paymentStatus)) {
        $sql .= " AND payment_status = '$paymentStatus'";
    }
    if (!empty($orderStatus)) {
        $sql .= " AND order_status = '$orderStatus'";
    }
    // Execute SQL query
    $query = mysqli_query($connection, $sql);
} else {
    // If it's not a POST request, fetch all orders
    $query = mysqli_query($connection, "SELECT * FROM tbl_order");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/report.css" />

</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="title">Order Report</div>
            <div class="subtitle">Date <?php echo date('Y-m-d'); ?></div>
        </div>
        <!-- /Header -->

        <!-- Content -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Filter</h5>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                        <div class="col-md-3 product_stock">
                            <select name="paymentStatus" class="form-select text-capitalize" fdprocessedid="9ja308">
                                <option value="">Payment Status</option>
                                <option value="Completed" <?php if ($paymentStatus == 'Completed') echo 'selected'; ?>>Completed</option>
                                <option value="Pending" <?php if ($paymentStatus == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Cancelled" <?php if ($paymentStatus == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3 product_stock">
                            <select name="orderStatus" class="form-select text-capitalize" fdprocessedid="9ja308">
                                <option value="">Order Status</option>
                                <option value="Completed" <?php if ($orderStatus == 'Completed') echo 'selected'; ?>>Completed</option>
                                <option value="Pending" <?php if ($orderStatus == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Cancelled" <?php if ($orderStatus == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="width: 100%; background-color:#9055fd">Apply changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr />
            <div class="table-responsive text-nowrap m-4">
                <table class="table" id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Order Date</th>
                            <th>Customer name</th>
                            <th>Email</th>
                            <th>Payment status</th>
                            <th>Order status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        while ($col = mysqli_fetch_array($query)) {
                            echo "<tr>
                                    <td>{$col['order_id']}</td>
                                    <td>{$col['order_date']}</td>
                                    <td>{$col['first_name']} {$col['last_name']}</td>
                                    <td>{$col['email']}</td>
                                    <td>{$col['payment_status']}</td>
                                    <td>{$col['order_status']}</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="report-content">

        </div>
        <!-- /Content -->

        <!-- Buttons -->
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary" style="background-color:#9055fd; color:#fff; " onclick="window.print()">Print Report</button>
            </div>
            <div class="col-md-6 text-end">
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
        <!-- /Buttons -->

        <!-- Footer -->
        <div class="footer">
            <p>&copy; <?php echo date('Y'); ?> Glam salon. All rights reserved.</p>
        </div>
        <!-- /Footer -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>
