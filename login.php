<?php
include "Utils/Validation.php";
include "Config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - <?=SITE_NAME?></title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #6C63FF, #3F3D56);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .logo img {
      width: 60px;
      height: 60px;
      margin-bottom: 1rem;
    }
    .logo h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }
    .error {
      color: #ff4d4d;
      margin-bottom: 1rem;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card p-4 p-md-5">
          <div class="text-center logo">
            <img src="assets/img/Logo.png" alt="Logo">
            <h2 class="fw-bold">Sign In</h2>
          </div>

          <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?=Validation::clean($_GET['error'])?></p>
          <?php } ?>

          <form action="Action/login.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="User name" value="admin">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password" value="Test@pass1">
            </div>
            <div class="mb-3">
              <label class="form-label">Role</label>
              <select name="role" class="form-select">
                <option value="Admin">Admin</option>
                <option value="Instructor">Instructor</option>
                <option value="Student">Student</option>
              </select>
            </div>
            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="text-center">
              <a href="signup.php">Sign Up</a> | 
              <a href="index.php">Home</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (optional, for dropdowns, etc.) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
