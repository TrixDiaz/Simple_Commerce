<?php
require '../assets/partials/_admin-check.php';
include '../assets/partials/_functions.php';
include '../assets/partials/_head.php';
include '../assets/partials/_sidebar.php';
include '../assets/partials/_urlName.php';
?>

<!-- sidebar main content  -->
<div class="col py-3">
    <nav class="mb-3 mx-4">
        <div class="d-flex justify-content-between mb-3">
            <div class="badge bg-primary text-uppercase" id="currentTimeDate"></div>
            <div class="badge bg-primary text-uppercase"><?php date_default_timezone_set('Asia/Manila');
                                                            echo date('F j, Y'); ?></div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class="h3">All Orders</div>
            <a href="../admin/dashboard.php?id=$user" class="btn btn-info h3"><i class="bi bi-arrow-clockwise"></i></a>
        </div>
    </nav>


    <?php if (isset($_GET['error'])) { ?>
        <div class="container">
            <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_GET['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <div class="container">
            <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_GET['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php } ?>


<?php

//=== CONNECT TO DATABASE
$connect_servername = "localhost";
$connect_username = "root";
$connect_password = "";
$connect_dbname = "test_admin";

//=== VALIDATE DATABSE connection_aborted
$connection = mysqli_connect($connect_servername, $connect_username, $connect_password);
if (!$connection) {
    die("Database Connection Failed");
}

$select_db = mysqli_select_db($connection, $connect_dbname);
if (!$select_db) {
    die("Database Selection Failed" . mysqli_error($connection));
}


?>


    <section id="add-admin">
        <div class="container-fluid">
            <div class="container mg-5" id="signupForm">
                <form action="../assets/partials/_handleSignup.php" method="POST">
                    <div class="card shadow mb-3 py-3">
                        <div class="card-body mx-5 py-5">
                            <div class="d-flex justify-content-around mb-3 overflow-auto">
                                <div class="container mt-3">
                                    <h2 class="mb-4">Customer Order's</h2>
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Client Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>john@example.com</td>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>john@example.com</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php include '../assets/partials/_footer.php'; ?>
</div>

<!-- sidebar end div  -->
</div>
</div>


<?php
include '../assets/scripts/admin.php';
include '../assets/partials/_foot.php';
?>