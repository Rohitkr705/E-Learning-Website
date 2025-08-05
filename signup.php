<?php 
include "Utils/Validation.php";


$fname = $uname = $email =$bd = $lname ="";
if (isset($_GET["fname"])) {
	$fname = Validation::clean($_GET["fname"]);
}
if (isset($_GET["uname"])) {
	$uname = Validation::clean($_GET["uname"]);
}
if (isset($_GET["email"])) {
	$email = Validation::clean($_GET["email"]);
}
if (isset($_GET["bd"])) {
	$bd = Validation::clean($_GET["bd"]);
}
if (isset($_GET["lname"])) {
	$lname = Validation::clean($_GET["lname"]);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - EduPulse</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #6C63FF, #3F3D56);

    }
    .overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }
    .form-holder {
      position: relative;
      z-index: 1;
      max-width: 500px;
      margin: 80px auto;
      background: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    .form-holder h2 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: 600;
    }
    .form-group label {
      font-weight: 500;
    }
    .error {
      background: #f8d7da;
      color: #842029;
      padding: 8px;
      border-radius: 4px;
      margin-bottom: 10px;
      font-size: 0.9rem;
    }
    .success {
      background: #d1e7dd;
      color: #0f5132;
      padding: 8px;
      border-radius: 4px;
      margin-bottom: 10px;
      font-size: 0.9rem;
    }
    button[type="submit"] {
      width: 100%;
    }
    .form-links {
      text-align: center;
      margin-top: 10px;
    }
    .form-links a {
      margin: 0 5px;
      text-decoration: none;
      color: #0d6efd;
    }
    .form-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="form-holder">
    <h2>Create New Account</h2>
    <?php if (isset($_GET['error'])) { ?>
      <div class="error"><?=Validation::clean($_GET['error'])?></div>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
      <div class="success"><?=Validation::clean($_GET['success'])?></div>
    <?php } ?>
    <form action="Action/signup.php" method="POST">
      <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control" placeholder="First name" value="<?=$fname?>">
      </div>
      <div class="mb-3">
        <label>Last Name</label>
        <input type="text" name="lname" class="form-control" placeholder="Last name" value="<?=$lname?>">
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?=$email?>">
      </div>
      <div class="mb-3">
        <label>Birth Date</label>
        <input type="date" name="date_of_birth" class="form-control" value="<?=$bd?>">
      </div>
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$uname?>">
      </div>
      <div class="mb-3">
        <label>New Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="re_password" class="form-control" placeholder="Confirm Password">
      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <div class="form-links">
      <a href="login.php">Sign In</a> | 
      <a href="index.php">Home</a>
    </div>
  </div>
</body>
</html>