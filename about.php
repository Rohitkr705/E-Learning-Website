<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - EduPulse</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .hero {
      position: relative;
      height: 50vh;
      background: url('assets/img/roboat_bg.jpg') no-repeat center center/cover;
    }
    .overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }
    header {
      transition: background-color 0.3s, box-shadow 0.3s;
    }
    nav a {
      text-decoration: none;
      color: white;
      margin: 0 10px;
      font-weight: 500;
      transition: color 0.3s;
    }
    nav a:hover, nav a.active {
      color: #ffc107;
    }
    section.content {
      padding: 40px 15px;
    }
    section.content h2, section.content h1 {
      color: #333;
    }
    footer {
      background: #212529;
      color: white;
      text-align: center;
      padding: 10px 0;
      font-size: 0.9rem;
    }
    .logo img {
      width: 40px;
      margin-right: 8px;
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero d-flex align-items-center justify-content-center text-center">
  <div class="overlay"></div>
  <header class="position-absolute top-0 start-0 w-100">
    <div class="container d-flex justify-content-between align-items-center py-3">
      <div class="logo d-flex align-items-center text-white">
        <img src="assets/img/Logo.png" alt="EduPulse">
        <span class="fs-4 fw-bold">EduPulse</span>
      </div>
      <nav>
        <a href="index.php">Home</a>
        <a href="about.php" class="active">About</a>
        <a href="signup.php">Sign Up</a>
        <a href="login.php">Login</a>
      </nav>
    </div>
  </header>
  <div class="text-black">
    <h1 class="display-5 fw-bold">About EduPulse</h1>
  </div>
</section>

<!-- Content Section -->
<!-- Add this in <head> if you haven’t already -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<section class="py-5" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
  <div class="container p-4 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.95);">
    <div class="text-center mb-4">
      <img src="assets/img/Logo.png" alt="EduPulse Logo" width="70" class="mb-2">
      <h1 class="mt-2 fw-bold text-primary">EduPulse</h1>
      <p class="text-muted">Your gateway to seamless online learning and teaching.</p>
    </div>

    <p class="text-center mb-4 fs-5">
      EduPulse is an intuitive online learning system that provides a user-friendly and accessible platform for learners, instructors, and administrators. 
      The system ensures seamless interaction, effective course management, and a rich learning experience.
    </p>

    <h2 class="text-center mb-4 fw-semibold text-dark">Our Goals</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="d-flex align-items-start bg-primary bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-primary fs-4 me-3"><i class="bi bi-grid"></i></span>
          <p class="mb-0">Enable users to easily navigate and explore available courses.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-success bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-success fs-4 me-3"><i class="bi bi-arrow-repeat"></i></span>
          <p class="mb-0">Streamline the course enrollment process for a hassle-free experience.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-warning bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-warning fs-4 me-3"><i class="bi bi-bar-chart"></i></span>
          <p class="mb-0">Provide an intuitive dashboard for tracking course progress, achievements, and certificates.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-danger bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-danger fs-4 me-3"><i class="bi bi-phone"></i></span>
          <p class="mb-0">Implement responsive design for optimal user experience across devices.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-info bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-info fs-4 me-3"><i class="bi bi-chat-dots"></i></span>
          <p class="mb-0">Foster engagement through discussion forums, ratings, and reviews.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-secondary bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-secondary fs-4 me-3"><i class="bi bi-pencil-square"></i></span>
          <p class="mb-0">Offer instructors an interface for course creation and content management.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-primary bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-primary fs-4 me-3"><i class="bi bi-clipboard-check"></i></span>
          <p class="mb-0">Provide tools for assignment creation and grading functionalities.</p>
        </div>
      </div>
      <div class="col">
        <div class="d-flex align-items-start bg-warning bg-opacity-10 rounded shadow-sm p-3 h-100">
          <span class="text-warning fs-4 me-3"><i class="bi bi-award"></i></span>
          <p class="mb-0">Facilitate the generation of certificates for course completion.</p>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>



<!-- Footer -->
<footer>
  <div class="container">
    <h6>EduPulse &copy; 2025</h6>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(window).on('scroll', function(){
    if ($(window).scrollTop() > 50) {
      $('header').addClass('bg-dark shadow');
    } else {
      $('header').removeClass('bg-dark shadow');
    }
  });
</script>

</body>
</html>
