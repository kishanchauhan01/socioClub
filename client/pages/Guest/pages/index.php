<?php include('navbar.php'); ?>

<style>
  body {
    background-color: rgb(34, 34, 34);
    /* Dark background */
    color: #fff;
    /* White text */
  }
</style>

<section class="container max-w-6xl mx-auto px-4 py-5 py-md-5">
  <div class="row align-items-center">
    <div class="col-12 col-md-6 text-center text-md-start mb-4 mb-md-0">
      <h1 class="display-4 fw-bold">Are you excited to dive into the world of social media?</h1>
      <p class="lead">Click Below button</p>

      <button
        class="btn btn-warning btn-lg"
        aria-label="Register for BIZVISTA '25">
        <a href="" class="text-decoration-none">Explore</a>
      </button>
    </div>
    <div class="col-12 col-md-6">
      <img
        loading="lazy"
        src="../photos/hero.jpg"
        class="img-fluid rounded shadow"
        alt="BIZVISTA event illustration" />
    </div>
  </div>
</section>

<div id="demo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin:40px">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../photos/swip1.jpg" class="d-block w-100 carousel-image-fit" alt="Fashion 1">
    </div>
    <div class="carousel-item">
      <img src="../photos/swip2.jpg" class="d-block w-100 carousel-image-fit" alt="Fashion 2">
    </div>
    <div class="carousel-item">
      <img src="../photos/swip3.jpg" class="d-block w-100 carousel-image-fit" alt="Fashion 3">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="text-center py-3" style="background-color: #333; color: #fff;">
  <p class="mb-0">© 2025 Socioclub. All rights reserved.</p>
</div>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });
</script>
</body>

</html>