<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) && isset($_SESSION['student_id'])) {
    include "../Controller/Student/Student.php";

    $_id = $_SESSION['student_id'];
    $student = getById($_id);

    if (empty($student['student_id'])) {
        $em = "Invalid Student id";
        Util::redirect("../logout.php", "error", $em);
    }

    // Get certificates
    $certificates = getCertificate($_id);

    // Header
    $title = "EduPulse - My Profile";
    include "inc/Header.php";
?>
<div class="container py-4">
  <!-- NavBar & Profile -->
  <?php include "inc/NavBar.php"; ?>
  <?php include "inc/Profile.php"; ?>

  <div class="r-side mx-2">
    <div class="card shadow-sm rounded-4 animate__animated animate__fadeIn mb-4">
      <div class="card-body">
        <h4 class="card-title mb-3 text-primary"><i class="fa fa-id-card me-2"></i>Account Information</h4>
        <ul class="list-group list-group-flush" style="max-width: 600px;">
          <li class="list-group-item"><strong>First Name:</strong> <?=$student['first_name']?></li>
          <li class="list-group-item"><strong>Last Name:</strong> <?=$student['last_name']?></li>
          <li class="list-group-item"><strong>Email:</strong> <?=$student['email']?></li>
          <li class="list-group-item"><strong>Date of Birth:</strong> <?=$student['date_of_birth']?></li>
          <li class="list-group-item"><strong>Joined At:</strong> <?=$student['date_of_joined']?></li>
          <li class="list-group-item"><strong>Student ID:</strong> <?=$student['student_id']?></li>
          <li class="list-group-item"><strong>Username:</strong> <?=$student['username']?></li>
        </ul>
      </div>
    </div>

    <?php if (!empty($certificates[0]["certificate_id"])) { ?>
    <div class="card shadow-sm rounded-4 animate__animated animate__fadeIn">
      <div class="card-body">
        <h4 class="card-title mb-3 text-success"><i class="fa fa-certificate me-2"></i>My Certificates</h4>
        <ul class="list-group list-group-flush">
          <?php $i = 0; foreach ($certificates as $certificate) { $i++; ?>
            <li class="list-group-item">
              <b><?=$i?>.</b> 
              <a href="../Certificate.php?certificate_id=<?=$certificate['certificate_id']?>" class="text-decoration-none">
                <?=$certificate['course_title']?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Footer -->
<?php include "inc/Footer.php"; ?>

<!-- Animate.css for smooth fade effect -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<?php
} else { 
    $em = "First login ";
    Util::redirect("../login.php", "error", $em);
}
?>
