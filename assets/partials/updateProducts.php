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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"]))
{

    // fetching name and password from textbox
    // $id = mysqli_real_escape_string($connection, $_POST['product_id']);
    // $name = mysqli_real_escape_string($connection, $_POST['product_name']);
    // $description = mysqli_real_escape_string($connection, $_POST['product_description']);
    // $category = mysqli_real_escape_string($connection, $_POST['product_category']);
    // $price = mysqli_real_escape_string($connection, $_POST['price']);

    $id = $_POST["id"];
    $name = $_POST["product_name"];
    $description = $_POST["product_description"];
    $category = $_POST["product_category"];
    $price = $_POST["price"];

    //$query =  mysqli_query($connection,"UPDATE products SET product_name ='" . $name . "', category = '" . $category . "', description = '" . $description . "', price = '" . $price . "',now() WHERE id = '" . $id . "' ");

    $sql = "UPDATE `products` SET product_name = '$name', category = '$category', description = '$description',  price = '$price', WHERE id='$id'";
    // $query = mysqli_query($connection, "UPDATE products (product_name,category,description,price)
	// 	    SET ('$name','$category','$description','$price') WHERE id = '$id';");

    if(mysqli_query($connection, $sql)){
        header('location: ../../admin/products.php?page=products');
    }
   
} //end
