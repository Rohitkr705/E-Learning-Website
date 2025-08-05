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

    // Header
    $title = "EduPulse - My Profile";
    include "inc/Header.php";
?>
<div class="container py-4">
  <!-- NavBar & Profile -->
  <?php include "inc/NavBar.php"; ?>
  <?php include "inc/Profile.php"; ?>

  <div class="r-side mx-2">
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger"><?=Validation::clean($_GET['error'])?></div>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success"><?=Validation::clean($_GET['success'])?></div>
    <?php } ?>

    <div class="row g-4">
      <div class="col-lg-6">
        <div class="card shadow-sm rounded-4 h-100 animate__animated animate__fadeIn">
          <div class="card-body">
            <h4 class="card-title mb-3 text-primary"><i class="fa fa-user-edit me-2"></i>Edit Account Information</h4>
            <form action="Action/upload-profile-details.php" method="POST">
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?=$student['first_name']?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?=$student['last_name']?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$student['email']?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" value="<?=$student['date_of_birth']?>" required>
              </div>
              <button type="submit" class="btn btn-primary rounded-pill px-4">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="card shadow-sm rounded-4 h-100 animate__animated animate__fadeIn">
          <div class="card-body">
            <h4 class="card-title mb-3 text-warning"><i class="fa fa-lock me-2"></i>Change Password</h4>
            <form action="Action/change-password.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter current password" required>
              </div>
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Enter new password" required>
                  <button type="button" class="btn btn-outline-secondary" onclick="generatePassword()">
                    Auto Generate
                  </button>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Re-enter new password" required>
              </div>
              <button type="submit" class="btn btn-warning rounded-pill px-4">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>

<!-- Footer -->
<?php include "inc/Footer.php"; ?>

<!-- Animate.css CDN for fade effect (optional, looks good) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script>
function generatePassword() {
  const randomString = Math.random().toString(36).slice(-6);
  document.getElementById('newPassword').value = randomString;
  document.getElementById('confirmPassword').value = randomString;
  document.getElementById('newPassword').type = "text";
  document.getElementById('confirmPassword').type = "text";
}
</script>
<?php
} else { 
  $em = "First login ";
  Util::redirect("../login.php", "error", $em);
}
?>
