<?php
include './assets/partials/_head.php';
include './assets/styles/index.php';
include './assets/user-partials/_registerModal.php';
include './assets/partials/_header.php';
?>

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


if ($_GET["page"] == "products") {

    //=== APPLICATION: Check data from DB
    $tablename = "products";

    // SQL statement to check record match from form to DB
    $query = "SELECT * FROM $tablename";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    // Count number of matching records
    $count = mysqli_num_rows($result);

    if ($count > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $data_id = $row['id'];
            $data_productname = $row['product_name'];
            $data_category = $row['category'];
            $data_description = $row['description'];
            $data_price = $row['price'];
            $data_img = $row['image'];


?>
            <div class="container mt-5">
                <div class='column mt-3 Grooming'>
                    <div class='content'>
                        <?php
                        echo "<img src='./assets/image/$data_img' class='gallery-item' alt='Grooming' style='width:100%' height='200px'>"
                        ?>
                        <hr>
                        <h5 class=''><?php echo $data_productname; ?></h5>
                        <span class='btn bg-info'>Price: <?php echo $data_price; ?></span>
                        <?php echo "<input type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop2$data_id'  value='Order'/>"; ?>
                        <hr>
                        <p><?php echo $data_description; ?></p>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <?php echo "<div class='modal fade' id='staticBackdrop2$data_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'> " ?>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Form </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php



                        ?>

                        <form method="POST" action="./assets/partials/addproducts.php">
                            <div class="container mt-5 overflow-auto">
                                <div class=' mt-3 Grooming'>
                                    <div class='content'>
                                        <?php
                                        echo "<img src='./assets/image/$data_img' class='gallery-item' alt='Grooming' style='width:100%' height='200px'>"
                                        ?>
                                        <hr>
                                        <h4 class='my-2'><input type="text" name="product_name" value="<?php echo $data_productname; ?>" hidden><?php echo $data_productname; ?></h4>
                                        <span class='btn bg-info mx-2 my-2'><input type="text" name="product_price" value="<?php echo $data_price; ?>" hidden> Price: <?php echo $data_price; ?></span>
                                        <br>
                                        <p class="my-2"><input type="text" name="product_description" value="<?php echo $data_description; ?>" hidden> <?php echo $data_description; ?></p>
                                        <span>Name:</span>
                                        <input type="text" name="username" class="form-control rounded my-2" required>
                                        <span>Phone:</span>
                                        <input type="text" name="phone" class="form-control rounded my-2" required>
                                        <span>Address:</span>
                                        <input type="text" name="address" class="form-control rounded my-2" required>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end container">
                                <input type="Submit" value="Submit Order" name="order" class="btn btn-success">
                            </div>
                        </form>
                        <?php
                        ?>

                    </div>
                </div>
            </div>
            </div>

<?php
        }
    }
}

?>

<?php include './assets/partials/_loginModal.php'; ?>
<?php include './assets/scripts/admin.php' ?>
<?php include './assets/partials/_foot.php'; ?>