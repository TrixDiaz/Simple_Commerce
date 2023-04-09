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
                <form action="../assets/partials/addproducts.php" method="POST">
                    <div class="card shadow mb-3 py-3">
                        <div class="card-body mx-5 py-5">
                            <div class="d-flex justify-content-around mb-3 overflow-auto" style='max-width: auto; max-height: 65vh;'>
                                <div class="container mt-3 ">
                                    <h2 class="mb-4">Customer Order's</h2>
                                    <?php
                                    $result = mysqli_query($connection, "SELECT * FROM orders ORDER BY id DESC ");
                                    if (mysqli_num_rows($result) > 0) {
                                    ?>
                                        <table class="table table-striped table-border table-hover">
                                            <tr>
                                                <td>Product Name</td>
                                                <td>Price</td>
                                                <td>Description</td>
                                                <td>Name</td>
                                                <td>Phone</td>
                                                <td>Address</td>
                                                <td>Option</td>
                                            </tr>
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <input type="text" name="id" hidden>
                                                    <td class="w-25"><input type="text" name="" value="$row['product_name']" hidden><?php echo $row["product_name"]; ?></td>
                                                    <td class="w-25"><input type="text" name="" value="$row['product_price']" hidden><?php echo $row["product_price"]; ?></td>
                                                    <td class="w-25"><input type="text" name="" value="$row['product_description']" hidden><?php echo $row["product_description"]; ?></td>
                                                    <td class="w-25"><input type="text" name="" value="$row['username']" hidden><?php echo $row["username"]; ?></td>
                                                    <td class="w-25"><input type="text" name="" value="$row['phone']" hidden><?php echo $row["phone"]; ?></td>
                                                    <td class="w-25"><input type="text" name="" value="$row['address']" hidden><?php echo $row["address"]; ?></td>
                                                    <?php echo "  <td><input type='submit' name='deleteorder' class='btn btn-danger mx-2 my-2' value='Done'></td> "; ?>
                                                </tr>
                                            <?php
                                                $i++;
                                            }

                                            ?>
                                        </table>
                                    <?php
                                    } else {
                                        echo "<h4> No Record's Found </h4>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- sidebar end div  -->
</div>
</div>


<?php
include '../assets/scripts/admin.php';
include '../assets/partials/_foot.php';
?>