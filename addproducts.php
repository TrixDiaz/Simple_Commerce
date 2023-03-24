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
		if (isset($_GET['product_id']) 
			and isset($_GET['product_name'])
			and isset($_GET['product_category'])
			and isset($_GET['product_description'])
			and isset($_GET['price'])
		){
		$product_id=$_GET['product_id'];
		$product_newname=$_GET['product_name'];
		$prod_category=$_GET['product_category'];
		$prod_description=$_GET['product_description'];
		$prod_price=$_GET['price'];
		$tablename= "products";
		
		$query = "INSERT INTO $tablename (id, product_name, category,description,price)
					VALUES ('$product_id','$product_newname','$prod_category',$prod_description,$prod_price);";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		
		if ($result){
			//header("location:products.php?page=list");
			echo ".";
		} else {
			echo "failed";
		}
			}
?>