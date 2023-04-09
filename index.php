<?php
include './assets/partials/_head.php';
include './assets/styles/index.php';
include './assets/user-partials/_registerModal.php';
?>

<title>Home</title>


<section id="index.php?page=home">
  <div class="parallax">
    <?php include './assets/partials/_header.php'; ?>
    <?php if (isset($_GET['error'])) { ?>
      <div class="container">
        <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-danger alert-dismissible fade show position-absolute top-1 end-0 mx-3" role="alert">
          <i class="bi bi-info-circle"><span>&nbsp;<?php echo $_GET['error']; ?> </span> </i>
        </div>
      </div>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
      <div class="container">
        <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-success alert-dismissible fade show position-absolute top-1 end-0 mx-3" role="alert">
          <i class="bi bi-info-circle"><span>&nbsp;<?php echo $_GET['success']; ?> </span> </i>
        </div>
      </div>
    <?php } ?>
    <br>
    <div class="container mt-5">
      <br>
      <div class="row">
        <div class="col-4">
          <!-- Sample Dashboard in index page or landing page -->
        </div>
        <div class="col-8 bg-dark mt-5 px-4 py-4" style="--bs-bg-opacity: .6;" align="center">
          <h4 style="color:white">PET LOVES PET ESSENTIALS</h4>
          <label style="color:white">A shop with the supplies your pets need!! Let your love for your pets grow more here, welcome to Pet Loves!
          </label>
        </div>
      </div>
    </div>
  </div>
</section>
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
                    <h4 class='my-2' name="product_name" value="<?php echo $data_productname; ?>"><?php echo $data_productname; ?></h4>
                    <span class='btn bg-info mx-2 my-2' name="product_price" value="<?php echo $data_price; ?>">Price: <?php echo $data_price; ?></span>
                    <br>
                    <p class="my-2" name="product_description" value="<?php echo $data_description; ?>"><?php echo $data_description; ?></p>
                    <span>Name:</span>
                    <input type="text" name="username" class="form-control rounded my-2">
                    <span>Phone:</span>
                    <input type="text" name="phone" class="form-control rounded my-2">
                    <span>Address:</span>
                    <input type="text" name="address" class="form-control rounded my-2">
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
<section id="#about?page=about">
  <div class="container-fluid bg-light my-5 py-5" align="center">
    <div class="container text-center">
      <h2 class="">About Us</h2>
      <h4>Wanna know were it all started?</h4>
      <label>
        We never really found the perfect store to find our pets ' needs. So, we created our own.
        Welcome to Pet Loves! We have everything your pet needs in their day to day living.
        We specialize in dog, cat, fish and bird products. Click the products section on our webpage to view our products.
      </label>
    </div>
  </div>
</section>


<?php include './assets/partials/_footer.php'; ?>
<?php include './assets/partials/_loginModal.php'; ?>
<?php include './assets/scripts/admin.php' ?>
<?php include './assets/partials/_foot.php'; ?>