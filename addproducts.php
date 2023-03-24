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
		if (isset($_GET['product_newid']) 
			and isset($_GET['product_newname'])
			and isset($_GET['prod_category'])
		){
		$product_id=$_GET['product_newid'];
		$product_newname=$_GET['product_newname'];
		$prod_category=$_GET['prod_category'];
		$tablename= "products";
		
		$query = "INSERT INTO $tablename (id, product_name, category)
					VALUES ('$product_id','$product_newname','$prod_category');";
		$result = mysqli_query($connection, $query) or die (mysqli_error($connection));
		
		if ($result){
			//header("location:products.php?page=list");
			echo ".";
		} else {
			echo "failed";
		}
			}
?>