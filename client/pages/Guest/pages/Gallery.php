<?php include('navbar.php'); ?>

<style>
  body {
    background-color: rgb(34, 34, 34); /* Dark background */
    color: #fff; /* White text */
  }

  .gallery-container {
    background-color: rgb(45, 45, 45); /* Slightly lighter dark background for the gallery */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Shadow for depth */
  }

  .gallery-title {
    font-size: 2.5rem; /* Larger font size */
    font-weight: bold; /* Bold font weight */
    text-align: center; /* Centered text */
    margin-bottom: 20px; /* Space below the title */
    background: linear-gradient(90deg, #ff6b6b, #f7b733); /* Gradient background */
    -webkit-background-clip: text; /* Clip background to text */
    -webkit-text-fill-color: transparent; /* Make text transparent to show gradient */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Text shadow for depth */
  }

  .gallery-card {
    background-color: #555; /* Card background color */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    overflow: hidden; /* Ensure images fit within the card */
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth transition for hover effects */
  }

  .gallery-card img {
    border-radius: 5px 5px 0 0; /* Rounded top corners for images */
    transition: transform 0.3s; /* Smooth zoom effect on hover */
  }

  .gallery-card:hover {
    transform: scale(1.05); /* Slightly enlarge the card on hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.7); /* Deeper shadow on hover */
  }

  .gallery-card img:hover {
    transform: scale(1.1); /* Zoom in the image on hover */
  }

  .gallery-card-title {
    padding: 10px;
    text-align: center;
    font-weight: bold; /* Bold title */
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for title */
  }

  .text-center {
    margin-top: 20px;
  }

  .text-center p {
    margin-bottom: 0; /* Remove bottom margin for the footer */
  }

  .text-center.py-3 {
    background-color: #333; /* Dark footer background */
    color: #fff; /* White text for footer */
  }
</style>

<div class="container mt-5 gallery-container">
  <h2 class="gallery-title">Socioclub Photo Gallery</h2>
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (1).jpg" class="img-fluid" alt="Fashion Image 1">
        <div class="gallery-card-title">Fashion Image 1</div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (2).jpg" class="img-fluid" alt="Fashion Image 2">
        <div class="gallery-card-title">Fashion Image 2</div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (3).jpg" class="img-fluid" alt="Fashion Image 3">
        <div class="gallery-card-title">Fashion Image 3</div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (4).jpg" class="img-fluid" alt="Fashion Image 4">
        <div class="gallery-card-title">Fashion Image 4</div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (5).jpg" class="img-fluid" alt="Fashion Image 5">
 <div class="gallery-card-title">Fashion Image 5</div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card gallery-card">
        <img src="../photos/gallery (6).jpg" class="img-fluid" alt="Fashion Image 6">
        <div class="gallery-card-title">Fashion Image 6</div>
      </div>
    </div>
  </div>
</div>

<div class="text-center py-3">
  <p>© 2025 Socioclub. All rights reserved.</p>
</div>

</body>
</html>