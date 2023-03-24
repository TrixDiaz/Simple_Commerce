<?php
include './assets/partials/_head.php';
include './assets/styles/index.php';
include './assets/user-partials/_registerModal.php';
?>
<title>Home</title>

<?php if (isset($_GET['error'])) { ?>
  <div class="container">
    <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-danger alert-dismissible fade show position-absolute top-1 end-0 mx-3 mt-5" role="alert">
      <i class="bi bi-info-circle"><span>&nbsp;<?php echo $_GET['error']; ?> </span> </i>
    </div>
  </div>
<?php } ?>

<?php if (isset($_GET['success'])) { ?>
  <div class="container">
    <div x-transition.leave.duration.800ms x-data="{show : true}" x-show="show" x-init="setTimeout(()=> show = false, 3000)" class="alert alert-success alert-dismissible fade show position-absolute top-1 end-0 mx-3 mt-5" role="alert">
      <i class="bi bi-info-circle"><span>&nbsp;<?php echo $_GET['success']; ?> </span> </i>
    </div>
  </div>
<?php } ?>
<section id="home">
  <div class="parallax">
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
            <li class="nav-item">
              <a class="nav-link" href="products.php?page=addforms">Add Product</a>
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
            <div class="col h5" align="end">
              <a href="#" class="navlink mx-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="bi bi-box-arrow-in-right "></i>
                Login
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
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
<?php include './assets/partials/_footer.php'; ?>
<?php include './assets/partials/_loginModal.php'; ?>
<?php include './assets/scripts/admin.php' ?>
<?php include './assets/partials/_foot.php'; ?>