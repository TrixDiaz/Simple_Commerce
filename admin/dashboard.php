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
            <div class="h3">Home</div>
            <a href="../admin/dashboard.php?id=$user" class="btn btn-info h3"><i class="bi bi-arrow-clockwise"></i></a>
        </div>
    </nav>
    <div class="row mb-3" align="center">
        <div class="col-auto col-md-4  col-xl-3 col-sm-4 mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Food</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <?php

                        $result = mysqli_query($conn, "select count(product_name) FROM products");
                        $row = mysqli_fetch_array($result);

                        $total = $row[0];
                        echo "Total " . $total;

                        ?>

                    </h6>
                    <a href="food-products.php" class="card-link">View Data</a>
                </div>
            </div>
        </div>
        <div class="col-auto col-md-4  col-xl-3 col-sm-4  mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Groom</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                       Total Count
                    </h6>
                   
                    <a href="grooming-products.php" class="card-link">View Data</a>
                </div>
            </div>
        </div>
        <div class="col-auto col-md-4  col-xl-3 col-sm-4  mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Essential</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total Count</h6>
              
                    <a href="essential-products.php" class="card-link">View Data</a>
                </div>
            </div>
        </div>
        <div class="col-auto col-md-4  col-xl-3 col-sm-4  mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Accessories</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total Count</h6>
                  
                    <a href="accessories-products.php" class="card-link">View Data</a>
                </div>
            </div>
        </div>
        <div class="col-auto col-md-4  col-xl-3 col-sm-4  mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"></p>
                    <a href="#" class="card-link"></a>
                </div>
            </div>
        </div>
        <div class="col-auto col-md-4  col-xl-3 col-sm-4  mx-4 my-2">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"></p>
                    <a href="#" class="card-link"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Here -->
    <?php include '../assets/partials/_footer.php'; ?>
</div>

<!-- sidebar end div  -->
</div>
</div>

<?php
include '../assets/scripts/admin.php';
include '../assets/partials/_foot.php';
?>