<?php
$connection = mysqli_connect("localhost", "root", "", "projectdb");

// Initialize variables to store filter values
$gender = '';
$status = '';
$date = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve filter values from the form
    $gender = $_POST['ProductCategory'];
    $status = $_POST['ProductStock'];
    $date = $_POST['date'];

    // Construct SQL query based on filter values
    $sql = "SELECT * FROM tbl_appointment WHERE 1=1";
    if (!empty($gender)) {
        $sql .= " AND gender = '$gender'";
    }
    if (!empty($status)) {
        $sql .= " AND status = '$status'";
    }
    // Execute SQL query
    $query = mysqli_query($connection, $sql);
} else {
    // If it's not a POST request, fetch all appointments
    $query = mysqli_query($connection, "SELECT * FROM tbl_appointment");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Report</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/report.css" />
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="title">Appointment Report</div>
            <div class="subtitle">Date <?php echo date('Y-m-d'); ?></div>
        </div>
        <!-- /Header -->

        <!-- Content -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Filter</h5>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                        <div class="col-md-3 product_category">
                            <select name="ProductCategory" class="form-select text-capitalize" fdprocessedid="enmacn">
                                <option value="">Gender</option>
                                <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3 product_stock">
                            <select name="ProductStock" class="form-select text-capitalize" fdprocessedid="9ja308">
                                <option value="">Status</option>
                                <option value="Completed" <?php if ($status == 'Completed') echo 'selected'; ?>>Completed</option>
                                <option value="Pending" <?php if ($status == 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Cancelled" <?php if ($status == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
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
                            <th>Customer name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Service</th>
                            <th>Date-Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        while ($col = mysqli_fetch_array($query)) {
                            echo "<tr>
                                    <td>{$col['appointment_id']}</td>
                                    <td>{$col['first_name']} {$col['last_name']}</td>
                                    <td>{$col['email']}</td>
                                    <td>{$col['gender']}</td>
                                    <td>{$col['contact']}</td>
                                    <td>{$col['service']}</td>
                                    <td>{$col['appointment_date']}</td>
                                    <td>{$col['status']}</td>
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
                <button class="btn btn-primary" onclick="window.print()">Print Report</button>
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
