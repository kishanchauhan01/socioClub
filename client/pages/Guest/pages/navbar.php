<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SocioClub Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <style>
    .navbar {
      background-color: rgb(34, 34, 34); /* Dark background for the navbar */
    }

    .navbar-toggler {
      border-color: white; /* White border for the toggler */
    }

    .navbar-toggler-icon {
      background-color: white; /* White color for the toggler icon */
    }

    .nav-link {
      color: white; /* White text for nav links */
      border: 1px solid transparent; /* Transparent border for initial state */
      transition: background-color 0.3s, border-color 0.3s; /* Smooth transition */
    }

    .nav-link:hover {
      color: rgb(35, 5, 204); /* Change color on hover */
      background-color: gray; /* Gray background on hover */
      border-color: rgb(35, 5, 204); /* Border color on hover */
    }

    .logo {
      font-size: 1.5rem; /* Logo font size */
      color: white; /* White color for the logo */
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <div class="logo" style="font-size: 2rem; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
  Socio <span style="color: rgb(35, 5, 204);">Club</span>
</div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> <!-- Centering the navbar items -->
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="Gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
        </ul>

        <div class="d-flex">
          <a class="btn btn-primary me-2" href="../../login/index.php">Login</a>
          <a class="btn btn-secondary" href="../../signup/index.php">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

</body>
</html>