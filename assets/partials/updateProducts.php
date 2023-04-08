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

if (isset($_POST["update"])) {
    // fetching name and password from textbox

  //  $id = mysqli_real_escape_string($connection, $_POST['id']);
    $name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $description = mysqli_real_escape_string($connection, $_POST['product_description']);
    $category = mysqli_real_escape_string($connection, $_POST['product_category']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);

    $query = mysqli_query(
        $connection,
        "UPDATE products 
        SET product_name=$name,product_description=$description,product_category=$category,price=$price 
        WHERE product_name=$name "
        );

    header('location: ../../admin/products.php?page=products');
    //../assets/partials/updateProducts.php
} //end
