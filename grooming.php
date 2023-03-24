<?php
 include './assets/partials/_head.php';
 include './assets/styles/index.php';
 include './assets/styles/product-style.php';
?>
<nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                      <a class="navbar-brand mx-5" href="#">  <img src="./assets/image/logo.png" alt="Logo" style="width:50px;" class="rounded-pill"> </a>
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
                            <li><a class="dropdown-item" href="products.php?category=all">All</a></li>
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
              
<!-- MAIN (Center website) -->
<div class="main mt-5">


<h2 class="mb-3">Grooming Products</h2>

<br>
<!-- Portfolio Gallery Grid -->
<section class="gallery min-vh-100">
<div class="row">
     <!--  ----------------------------------------------------------- Grooming ---------------------------------------------------------------  -->
  <div class="column mt-2 Grooming">
    <div class="content">
      <img src="./assets/image/Shampoo1.jpg" class="gallery-item" alt="Grooming" style="width:100%" height="200px">
      <hr>
      <h5>Shampoo</h5>
      <span class="badge bg-info">₱100</span>
      <hr>
      <p>to treat bacterial infections, skin rashes, and dandruff in pets. mild to prevent the loss of natural oils. It still gets the dirt out while protecting his skin and coat.</p>
    </div>
  </div>
  <div class="column mt-2 Grooming">
    <div class="content">
    <img src="./assets/image/tootbursh.jfif" class="gallery-item" alt="Toothbrush" style="width:100%" height="200px">
    <hr>
    <h5>Toothbrush</h5>
    <span class="badge bg-info">₱100</span>
    <hr>
    <p>Pick a peaceful time to brush your pet's teeth, a toothbrush with slanted handles that you can use for your pet with ease.</p>
    </div>
  </div>
  <div class="column mt-2 Grooming">
    <div class="content">
    <img src="./assets/image/Cleaner1.jpg" class="gallery-item" alt="Paw cleaner" style="width:100%" height="200px">
    <hr>
    <h5>Paw cleaner</h5>
    <span class="badge bg-info">₱100</span>
    <hr>
      <p>Use this paw cleanser to make cleaning easier and faster than battling with cloths and buckets of water.</p>
    </div>
  </div>
  <div class="column mt-2 Grooming">
    <div class="content">
    <img src="./assets/image/Perfume1.jpg" class="gallery-item" alt="Perfume" style="width:100%" height="200px">
    <hr>
    <h5>Perfume</h5>
    <span class="badge bg-info">₱100</span>
    <hr>
      <p>Regarding our pets, we should use fragrances and scented items with caution. Directly applying strongly fragrant shampoos or sprays to a pet may result in skin responses, nausea, lethargy, or even airway irritation.</p>
    </div>
  </div>
</section>
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
                          Lorem ipsum dolor sit amet consecteturadipisicing elit. Perferendis soluta voluptas eaque, numquam veritatis aperiam expedita deleniti, nesciunt cum alias velit. Cupiditate commodi
                          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus cum nisi ea optio unde aliquam quia reprehenderit atque eum tenetur! 
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed placeat debitis corporis voluptates modi quibusdam quidem voluptatibus illum, maiores sequi.
                      </label>
                  </div>
             </div>
    </div>
</section>


<script>
document.addEventListener("click",function (e){
  if(e.target.classList.contains("gallery-item")){
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