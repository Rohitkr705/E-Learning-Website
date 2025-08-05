<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduPulse - Online Learning System</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background: url('') no-repeat center center/cover;
      color: #333;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                  url('assets/img/background_bg.jpg') no-repeat center center/cover;
      color: #fff;
      padding: 100px 20px;
      text-align: center;
    }

    .hero img {
      width: 70px;
      margin-bottom: 15px;
    }

    .section-title {
      margin-bottom: 30px;
      font-weight: 600;
      text-align: center;
    }

    .info-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    footer {
      background: #343a40;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    .navbar-brand span {
      font-size: 1.4rem;
      font-weight: 600;
    }

    .lead {
      max-width: 700px;
      margin: auto;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="assets/img/Logo.png" alt="EduPulse Logo" width="40" height="40" class="me-2">
      <span>EduPulse</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero section -->
<section class="hero">
  <div class="container">
    <img src="assets/img/Logo.png" alt="EduPulse Logo">
    <h1 class="display-4 fw-bold">Welcome to EduPulse</h1>
    <p class="lead">Where knowledge meets accessibility. Empowering learners, instructors, and administrators.</p>
  </div>
</section>

<!-- Main content -->
<!-- Add this in <head> if not added already -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<section class="py-5" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
  <div class="container p-4 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.95);">
    <div class="row g-4">
      <!-- Learners Box -->
      <div class="col-md-6">
        <div class="info-card p-4 rounded shadow-sm h-100" style="background: rgba(100, 181, 246, 0.1);">
          <div class="d-flex align-items-center mb-3">
            <span class="fs-3 text-primary me-2"><i class="bi bi-mortarboard"></i></span>
            <h3 class="section-title mb-0 fw-semibold">For Learners</h3>
          </div>
          <p>Embark on your learning journey with ease. Browse through a diverse range of courses, enroll effortlessly, and track your progress in real-time. Engage with fellow learners through discussion forums, share insights, and earn certificates as a testament to your accomplishments.</p>
        </div>
      </div>
      <!-- Instructors Box -->
      <div class="col-md-6">
        <div class="info-card p-4 rounded shadow-sm h-100" style="background: rgba(129, 212, 250, 0.1);">
          <div class="d-flex align-items-center mb-3">
            <span class="fs-3 text-success me-2"><i class="bi bi-person-lines-fill"></i></span>
            <h3 class="section-title mb-0 fw-semibold">For Instructors</h3>
          </div>
          <p>Shape the future of education by creating captivating courses. Our instructor tools provide an intuitive environment for content creation, quiz management, and grading. Stay connected with your students through forums, monitor their progress, and witness the impact of your expertise.</p>
        </div>
      </div>
    </div>
    <!-- Common Goal Box -->
    <div class="info-card text-center mt-4 p-4 rounded shadow-sm" style="background: rgba(255, 214, 102, 0.2);">
      <p class="mb-0 fs-5">At the heart of our platform is a commitment to fostering a collaborative and interactive learning experience. Join us on this educational adventure, where knowledge knows no bounds. Welcome to a world of learning at your fingertips.</p>
    </div>
  </div>
</section>


<!-- Footer -->
<footer>
  <div class="container">
    <h6>EduPulse &copy; 2025</h6>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
