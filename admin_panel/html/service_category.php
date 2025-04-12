<?php

//Connection with database
$connection = mysqli_connect("localhost", "root", "", "projectdb");

//Add Data
if (isset($_POST['btn_submit'])) {
    $name = $_POST['service_category'];
    $qu = mysqli_query($connection, "INSERT INTO `tbl_service_category` (`category_id`, `category_name`) VALUES (NULL, '$name')");
}

//delete Data

if (isset($_GET['did'])) {
    mysqli_query($connection, "delete from tbl_service_category where category_id='$_GET[did]'");
} else {
    mysqli_error($connection);
}

//Display data
$query = mysqli_query($connection, "select * from tbl_service_category");

?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Service Category</title>

    <meta name="description" content="" />

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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span><span class="text-muted fw-light">Services /</span> Service Category</h4>

                        <hr class="my-5" />

                        <!-- Bootstrap Table with Header - Light -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <div class="card-header d-flex border-top rounded-0 flex-wrap py-md-0">
                                    <div class="me-4 mt-3 mb-3 ms-n2">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search Product" aria-controls="DataTables_Table_0"></label></div>
                                    </div>
                                    <div class="me-4 mt-3 mb-3 ms-n2">
                                        <div class="d-flex align-items-md-center justify-content-flex-end mb-3 mb-sm-0 gap-5 pt-0">
                                            <div>
                                                <select id="defaultSelect" class="form-select">
                                                    <option>7</option>
                                                    <option value="1">10</option>
                                                    <option value="2">20</option>
                                                    <option value="3">50</option>
                                                    <option value="3">70</option>
                                                    <option value="3">100</option>
                                                </select>
                                            </div>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Secondary
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                                                </ul>
                                            </div>

                                            <div class="dt-buttons d-flex flex-wrap">
                                                <button class="dt-button add-new btn btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" fdprocessedid="roaxkl" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                                    <span><i class="mdi mdi-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Category</span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php
                                        while ($col = mysqli_fetch_array($query)) {
                                            echo "<tr>
                                            <td>$col[0]</td>
                                            <td>$col[1]</td>
                                            <td>
                                                <div class='dropdown'>
                                                    <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                                        <i class='mdi mdi-dots-vertical'></i>
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='service_category.php?uid=$col[0]'><i class='mdi mdi-pencil-outline me-1'></i> Edit</a>
                                                        <a class='dropdown-item' href='service_category.php?did=$col[0]'><i class='mdi mdi-trash-can-outline me-1'></i>Delete</a>
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

    <!-- Modal for Add record-->
    <div class="col-lg-4 col-md-3">
        <small class="text-light fw-medium">Backdrop</small>
        <div class="mt-3">

            <!-- Modal -->
            <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content" method="post">
                        <div class="modal-header">
                            <h4 class="modal-title" id="backDropModalTitle">Add Service Category</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-4 mt-2">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" name="service_category" id="nameBackdrop" class="form-control" placeholder="Enter category Name" />
                                        <label for="nameBackdrop">Category Name</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal For Delete -->
    <div class="col-lg-4 col-md-3">
        <small class="text-light fw-medium">Backdrop</small>
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                Launch modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <form class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="backDropModalTitle">Delete Record</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <h4>Are you Sure !<br/> You want Delete this Record..?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="button" name='dlt' class="btn btn-primary">Comfirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>