<?php
//=== CONNECT TO DATABASE
$connect_servername = "localhost";
$connect_username = "root";
$connect_password = "";
$connect_dbname = "test_admin";

//=== VALIDATE DATABSE connection_aborted
$connection = mysqli_connect($connect_servername, $connect_username, $connect_password);
if (!$connection) {
	die("Database Connection Failed" . mysqli_error());
}

$select_db = mysqli_select_db($connection, $connect_dbname);
if (!$select_db) {
	die("Database Selection Failed" . mysqli_error($connection));
}

if (isset($_POST['add'])) {

	
	// fetching name and password from textbox
	$id = mysqli_real_escape_string($connection, $_POST['product_id']);
	$name = mysqli_real_escape_string($connection, $_POST['product_name']);
	$description = mysqli_real_escape_string($connection, $_POST['product_description']);
	$category = mysqli_real_escape_string($connection, $_POST['product_category']);
	$price = mysqli_real_escape_string($connection, $_POST['price']);
	$image = mysqli_real_escape_string($connection, $_POST['image']);

	$query = mysqli_query($connection, "INSERT INTO products (product_name,category,description,price,image)
		    VALUES ('$name','$category','$description','$price','$image')");

	if ($query) {
		header('location: ../../admin/products.php?page=products');
	}


	
} //end

if (isset($_POST["update"])) {
	// fetching name and password from textbox
	mysqli_query($connection, "UPDATE products SET product_name='" . $_POST['product_name'] . "', description='" . $_POST['product_description'] . "',category='" . $_POST['product_category'] . "', price='" . $_POST['price'] . "' WHERE id = '" . $_POST['id'] . "' ");

	header('location: ../../admin/products.php?page=products');
	
} //end

if (isset($_POST["order"])) {

	// fetching name and password from textbox

	$name = mysqli_real_escape_string($connection, $_POST['product_name']);
	$description = mysqli_real_escape_string($connection, $_POST['product_description']);
	$price = mysqli_real_escape_string($connection, $_POST['product_price']);
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$phone = mysqli_real_escape_string($connection, $_POST['phone']);
	$address = mysqli_real_escape_string($connection, $_POST['address']);

	$query = mysqli_query($connection, "INSERT INTO orders (product_name,product_description,product_price,username,phone,address)
		    VALUES ('$name','$description','$price','$username','$phone','$address')");

	if ($query) {
		header("location: ../../index.php?success=Order Successfully Sent!");
	}

} //end

if (isset($_POST["deleteorder"])) {

	$id = mysqli_real_escape_string($connection, $_POST['id']);
	// Create connection
	
	// Check connection

	// sql to delete a record
	$sql = "DELETE FROM orders WHERE id=$id " ;

	if ($sql === TRUE) {
		header('location: ../../admin/orders.php?success=Successfully Deleted Record');
	} else {
		header('location: ../../admin/orders.php?error=Error Deleting Record');
	}

	$connection->close();
}


