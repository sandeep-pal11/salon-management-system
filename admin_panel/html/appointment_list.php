<?php

$connection = mysqli_connect("localhost", "root", "", "projectdb");
if (isset($_GET['did'])) {

    //for delete releted image from folder
    mysqli_query($connection, "delete from tbl_appointment where appointment_id='$_GET[did]'");
} else {
    mysqli_error($connection);
}

$query = mysqli_query($connection, "SELECT * FROM tbl_appointment JOIN tbl_service_category ON tbl_appointment.service=tbl_service_category.category_id");

?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Appointment List</title>

    <meta name="description" content="" />

    <!-- Data table cdn-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/materialdesignicons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js">
    </script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php
            include "sidebar.php";
            ?>

            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
                include "navbar.php";
                ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span><span class="text-muted fw-light">Appointment /</span> Appointment List</h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Light -->
                        <div class="card">
                            <div class="table-responsive text-nowrap m-4">
                                <table class="table" id="myTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Customer name</th>
                                            <th>Gender</th>
                                            <th>Contact</th>
                                            <th>Service</th>
                                            <th>Date-Time</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-1">
                                        <?php
                                        while ($appointment = mysqli_fetch_array($query)) {
                                            echo "<tr>
                                            <td>#{$appointment['appointment_id']}</td>
                                            <td class='sorting_1'>
                                                <div class='d-flex justify-content-start align-items-center product-name'>
                                                    <div class='d-flex flex-column'><span class='text-nowrap text-heading fw-medium'>{$appointment['first_name']} {$appointment['last_name']}</span><small class='text-truncate d-none d-sm-block'>{$appointment['email']}</small></div>
                                                </div>
                                            </td>
                                            <td>{$appointment['contact']}</td>
                                            <td>{$appointment['gender']}</td>
                                            <td>{$appointment['category_name']}</td>
                                            <td>{$appointment['appointment_date']}</td>";
                                            echo "<td>";
                                            if ($appointment['status'] == 'completed' || $appointment['status'] == 'Completed') {
                                                echo "<span class='badge rounded-pill bg-label-success'>Completed</span>";
                                            } elseif ($appointment['status'] == 'pending' || $appointment['status'] == 'Pending') {
                                                echo "<span class='badge rounded-pill bg-label-warning'>Pending</span>";
                                            } elseif ($appointment['status'] == 'cancelled' || $appointment['status'] == 'Cancelled') {
                                                echo "<span class='badge rounded-pill bg-label-danger'>Cancelled</span>";
                                            }
                                            echo "</td>
                                            <td>{$appointment['message']}</td>
                                            <td>
                                                <div class='dropdown'>
                                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                                        <i class='mdi mdi-dots-vertical'></i>
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='update_appointment.php?uid={$appointment['appointment_id']}'><i class='mdi mdi-pencil-outline me-1'></i> Edit</a>
                                                        <a class='dropdown-item' href='appointment_list.php?did={$appointment['appointment_id']}'><i class='mdi mdi-trash-can-outline me-1'></i> Delete</a>
                                                        <a class='dropdown-item' href='view_appointment.php?aid={$appointment['appointment_id']}'><i class='mdi mdi-eye-outline me-1'></i> View</a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                        <!-- Bootstrap Table with Header - Light -->

                        <hr class="my-5" />
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php
                    include "footer.php";
                    ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

<!-- datatabless jquery cdn link-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</html>