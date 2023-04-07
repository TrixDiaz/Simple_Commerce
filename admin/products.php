<?php
require '../assets/partials/_admin-check.php';
include '../assets/partials/_functions.php';
include '../assets/partials/_head.php';
include '../assets/partials/_sidebar.php';
include '../assets/partials/_urlName.php';
include '../assets/styles/product-style.php';
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
            <div class="h3">Products</div>
            <a href="../admin/dashboard.php?id=$user" class="btn btn-info h3"><i class="bi bi-arrow-clockwise"></i></a>
        </div>
    </nav>
    <div class="container overflow-auto" style='max-width: auto; max-height: 90vh;'>
        <div class="card shadow">
            <div class="card-body">
                <div class="card-content">
                    <div class="row">
                        <div class="col">
                            <div class="h4">
                                <span>New Item</span>
                                <button class="btn btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle"></i>
                            </div>
                            <table class="table">

                                <tbody>
                                    <?php
                                    //=== CONNECT TO DATABASE
                                    $connect_servername = "localhost";
                                    $connect_username = "root";
                                    $connect_password = "";
                                    $connect_dbname = "test_admin";

                                    //=== VALIDATE DATABSE connection_aborted
                                    $connection = mysqli_connect($connect_servername, $connect_username, $connect_password);
                                    if (!$connection) {
                                        die("Database Connection Failed" . mysqli_error($connection));
                                    }

                                    $select_db = mysqli_select_db($connection, $connect_dbname);
                                    if (!$select_db) {
                                        die("Database Selection Failed" . mysqli_error($connection));
                                    }


                                    if ($_GET["page"] == "products") {

                                        //=== APPLICATION: Check data from DB
                                        $tablename = "products";

                                        // SQL statement to check record match from form to DB
                                        $query = "SELECT * FROM $tablename";
                                        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

                                        // Count number of matching records
                                        $count = mysqli_num_rows($result);

                                        /* if ($_GET["page"]=="list"){
					$tablename = "section";
					$query = "SELECT * FROM $tablename ";
					$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
					$count = mysqli_num_rows($result);
				} */


                                        if ($count > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $data_id = $row['id'];
                                                $data_productname = $row['product_name'];
                                                $data_category = $row['category'];
                                                $data_description = $row['description'];
                                                $data_price = $row['price'];
                                                $data_img = $row['image'];

                                                echo "
							<div class='column mt-3 Grooming'>
								<div class='content'>
								  <img src='../assets/image/$data_img' class='gallery-item' alt='Grooming' style='width:100%' height='200px'>
								  <hr>
								  <h5>$data_productname</h5>
								  <span class='badge bg-info'>Price: $data_price</span> 
								  <a href='products.php?page=detail&id=$data_id'>View</a> 
								  <a href='products.php?page=edit&id=$data_id'>Edit</a>
								  <hr>
								  <p>$data_description</p>
								</div>
							  </div>";
                                            } // closing of while
                                        }
                                    } else if ($_GET["page"] == "addform") {
                                    ?>

                                        <form method="POST" action="../assets/partials/addproducts.php">
                                            <table name="guestTable" id="guestTable">
                                                <tr>
                                                    <th> ID </th>
                                                    <td> <input class="my-2 mx-1 py-2 rounded" style="width: 50rem;" type="text" name="product_id" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th> Product Name </th>
                                                    <td> <input class="my-2 mx-1 py-2 rounded" style="width: 50rem;" type="text" name="product_name" /></td>
                                                </tr>
                                                <tr>
                                                    <th> Description </th>
                                                    <td> <input class="my-2 mx-1 py-2 rounded" style="width: 50rem;" type="text" name="product_description" /></td>
                                                </tr>
                                                <tr>
                                                    <th> Category </th>
                                                    <td>
                                                        <select name="product_category" class="my-2 mx-1 rounded py-2" style="width: 50rem;">
                                                            <option value="Grooming"> Grooming </option>
                                                            <option value="Accessories"> Accessories </option>
                                                            <option value="Essentials"> Essentials </option>
                                                            <option value="Food"> Food </option>
                                                        </select>
                                                    </td>
                                                <tr>
                                                    <th> Price </th>
                                                    <td> <input type="text" name="price" class="my-2 mx-1 py-2 rounded" style="width: 50rem;" /></td>
                                                </tr>
                                                <tr>
                                                    <th>File</th>
                                                    <td>
                                                        <div class="col-4 my-2 py-2">

                                                            <input type="file" class="form-control" name="image" id="image">

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table><br />
                                            <input type="submit" value="ADD PRODUCT" name="add" class="btn btn-success mx-1" />
                                        </form>
                                    <?php

                                    } else if ($_GET["page"] == "detail") {

                                        $data_id = mysqli_real_escape_string($connection, $_GET['id']);

                                        //=== APPLICATION: Check data from DB
                                        $tablename = "products";

                                        // SQL statement to check record match from form to DB
                                        $query = "SELECT * FROM $tablename WHERE id = '$data_id' ";
                                        $sql = mysqli_query($conn, $query);
                                        $result = mysqli_fetch_assoc($sql);

                                    ?>
                                        <table name="guestTable" id="guestTable" align="center">
                                            <tr>
                                                <th style="width:25%;"> ID </th>
                                                <td> <span><?php echo $result['id']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th> Product Name </th>
                                                <td> <span><?php echo $result['product_name']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th> Category </th>
                                                <td> <span><?php echo $result['category']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th> Description </th>
                                                <td> <span><?php echo $result['description']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <th> Price </th>
                                                <td> <span><?php echo $result['price']; ?></span></td>
                                            </tr>

                                        </table>
                                    <?php
                                    } else if ($_GET["page"] == "edit") {

                                        $data_id = mysqli_real_escape_string($connection, $_GET['id']);

                                        //=== APPLICATION: Check data from DB
                                        $tablename = "products";

                                        // SQL statement to check record match from form to DB
                                        $query = "SELECT * FROM $tablename WHERE id = '$data_id' ";
                                        $sql = mysqli_query($conn, $query);
                                        $result = mysqli_fetch_assoc($sql);
                                    ?>
                                        <table name="guestTable" id="guestTable" align="center">
                                            <form action="../assets/partials/updateProducts.php" method="POST">
                                                <tr>
                                                    <th> ID </th>
                                                    <td>
                                                        <span name="product_id"><?php echo $result['id']; ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th> Product Name </th>
                                                    <td> <input class="my-2 mx-1" name="product_name" style="width: 50rem;" type="text" value="<?php echo $result['product_name']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th> Category </th>
                                                    <td> <input class="my-2 mx-1" name="product_category" style="width: 50rem;" type="text" value="<?php echo $result['category']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th> Description </th>
                                                    <td> <input class="my-2 mx-1" name="product_description" style="width: 50rem;" type="text" value="<?php echo $result['description']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th> Price </th>
                                                    <td> <input class="my-2 mx-1" name="price" style="width: 50rem;" type="text" value="<?php echo $result['price']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td> <input type="submit" value="Update" name="update" class="btn btn-primary"></td>
                                                </tr>
                                            </form>
                                        </table>
                                    <?php
                                        // echo "<p class='redtext'>No record found</p>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD NEW ITEM</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../assets/partials/addproducts.php" method="POST">
                        <table>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="product_name">
                                        <label for="email">Product Name</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="product_description">
                                        <label for="email">Description</label>
                                    </div>
                                </div>
                                <div class="col-4 mt-4">
                                    <form action="#">
                                        <input type="file" class="form-control" name="image" id="image">
                                    </form>
                                </div>
                                <div class="col-4">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="price">
                                        <label for="email">Price</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4 mt-4">
                                        <select class="form-select bg-light " aria-label="Default select example" name="product_category">
                                            <option selected>Category</option>
                                            <option value="Food">Food</option>
                                            <option value="Essentials">Essesntial</option>
                                            <option value="Accessories">Accessories</option>
                                            <option value="Grooming">Grooming</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </table>

                        <input type="submit" value="ADD PRODUCT" name="add" class="btn btn-success" />
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php // include  '../assets/partials/_footer.php'; 
    ?>
</div>

<!-- sidebar end div  -->
</div>
</div>

<?php
include '../assets/scripts/admin.php';
include '../assets/partials/_foot.php';
?>