<?php
include './assets/partials/_head.php';
include './assets/styles/index.php';
include './assets/styles/product-style.php';
?>
<nav class="navbar navbar-expand-lg bg-light">
	<div class="container-fluid">
		<a class="navbar-brand mx-5" href="#"> <img src="./assets/image/logo.png" alt="Logo" style="width:50px;" class="rounded-pill"> </a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarScroll">
			<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Product
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="products.php?page=products">All</a></li>
						<li><a class="dropdown-item" href="grooming.php?category=grooming">Grooming</a></li>
						<li><a class="dropdown-item" href="accessories.php?category=accessories">Accessories</a></li>
						<li><a class="dropdown-item" href="essential.php?category=essential">Essentials</a></li>
						<li><a class="dropdown-item" href="food.php?category=food">Foods</a></li>
					</ul>
				</li>
			</ul>
			<div class="d-flex">
				<div class="col mt-2 h5" align="end">
					<a href="#" class="navlink mx-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal">
						<i class="bi bi-box-arrow-in-right "></i>
						Login
					</a>
				</div>
			</div>
		</div>
	</div>
</nav>

<!-- MAIN (Center website) -->
<div class="main mt-5">


	<h2 class="mb-3">All Products</h2>

	<!-- Portfolio Gallery Grid -->
	<section class="gallery min-vh-100">
		<div class="row">
			<!--  ----------------------------------------------------------- Grooming ---------------------------------------------------------------  -->
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
								  <img src='./assets/image/$data_img' class='gallery-item' alt='Grooming' style='width:100%' height='200px'>
								  <hr>
								  <h5>$data_productname</h5>
								  <span class='badge bg-info'>$data_price</span> 
								  <a href='products.php?page=detail&id=$data_id'>View</a> 
								  <a href='products.php?page=edit&id=$data_category'>Edit</a>
								  <hr>
								  <p>$data_description</p>
								</div>
							  </div>";


						/* echo "<tr><td>$data_id	</td>
							<td>$data_productname</td>
							<td>$data_category</td>
							<td>$data_description</td>
							<td>$data_price</td>
							<td><a href='section.php?page=detail&id=$data_id'>View</a> 
								<a href='section.php?page=edit&id=$data_category'>Edit</a></td></tr>"; */
					} // closing of while
				}
			} else if ($_GET["page"] == "addform") {
			?>

				<form name="addproductFORM" id="addproductFORM" method="POST" action="addproducts.php">
					<table name="guestTable" id="guestTable" border="1">
						<tr>
							<th> ID </th>
							<td> <input type="text" name="product_id" / readonly></td>
						</tr>
						<tr>
							<th> Product Name </th>
							<td> <input type="text" name="product_name" /></td>
						</tr>
						<tr>
							<th> Description </th>
							<td> <input type="text" name="product_description" /></td>
						</tr>
						<tr>
							<th> Category </th>
							<td>
								<select name="product_category">
									<option value="Grooming"> Grooming </option>
									<option value="Accessories"> Accessories </option>
									<option value="Essentials"> Essentials </option>
									<option value="Food"> Food </option>
								</select>
							</td>
						<tr>
							<th> Price </th>
							<td> <input type="text" name="price" /></td>
						</tr>
					</table><br />
					<input type="submit" value="ADD PRODUCT" name="add" />
				</form>
			<?php

			} else if ($_GET["page"] == "detail") {

			?>

				<table name="guestTable" id="guestTable" border="1">
					<tr>
						<th style="width:25%;"> ID </th>
						<td> <?php echo "$data_id"; ?></td>
					</tr>
					<tr>
						<th> Product Name </th>
						<td> <?php echo "data"; ?></td>
					</tr>
					<tr>
						<th> Category </th>
						<td> <?php echo "data"; ?></td>
					</tr>
					<tr>
						<th> Description </th>
						<td> <?php echo "data"; ?></td>
					</tr>
					<tr>
						<th> Price </th>
						<td> <?php echo "data"; ?></td>
					</tr>
				</table>
			<?php
			} else {
				echo "<p class='redtext'>No record found</p>";
			}

			?>
			<!-- END GRID -->
		</div>

		<!-- END MAIN -->
</div>
<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" align="center">
				<img src="" class="modal-img" alt="modal img" width="70%">
			</div>
		</div>
	</div>
</div>
<section id="about">
	<div class="container-fluid bg-light my-5 py-5" align="center">
		<div class="container text-center">
			<div>
				<h1>About Us</h1>
				<h4>Wanna know were it all started?</h4>
				<label>
					We never really found the perfect store to find our pets' needs. So, we created our own.
					Welcome to Pet Loves! We have everything your pet needs in their day to day living.
					We specialize in dog, cat, fish and bird products. Click the products section on our webpage to view our products.
				</label>
			</div>
		</div>
	</div>
</section>


<script>
	document.addEventListener("click", function(e) {
		if (e.target.classList.contains("gallery-item")) {
			const src = e.target.getAttribute("src");
			document.querySelector(".modal-img").src = src;
			const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
			myModal.show();
		}
	})
</script>


<?php include './assets/partials/_footer.php'; ?>
<?php include './assets/partials/_loginModal.php'; ?>
<?php include './assets/partials/_foot.php'; ?>