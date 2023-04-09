<?php
include './assets/partials/_head.php';
include './assets/styles/index.php';
include './assets/user-partials/_registerModal.php';
?>

<title>Home</title>


<section id="home">
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

<section id="about">
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