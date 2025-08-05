<?php 
session_start();
include "../Utils/Util.php";
if (isset($_SESSION['username']) && isset($_SESSION['student_id'])) {

    include "../Controller/Student/Course.php";
    include "../Controller/Student/EnrolledStudent.php";
    
    $student_id = $_SESSION['student_id'];
    $courses = getEnrolledCourses($student_id);
    $row_count = $courses[0]['count'];

    # Header
    $title = "EduPulse - Enrolled Courses";
    include "inc/Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background: linear-gradient(135deg, #36d1dc 0%, #5b86e5 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
h4.course-list-title {
    margin-top: 20px;
    margin-bottom: 20px;
    font-weight: bold;
    color: #fff;
    text-align: center;
}
.course-list .card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
.btn-primary {
    border-radius: 8px;
}
</style>
</head>
<body>
<div class="container py-4">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <?php if ($row_count > 0) { ?>
    <h4 class="course-list-title">All Enrolled Courses (<?=$row_count?>)</h4>
    <div class="course-list">
      <?php for ($i=1; $i <= $row_count; $i++) { ?>
        <div class="card mb-4">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../Upload/thumbnail/<?=$courses[$i]["cover"]?>" class="img-fluid rounded-start" alt="course">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?=$courses[$i]["title"]?></h5>
                <p class="card-text"><?=$courses[$i]["description"]?></p>
                <p class="card-text"><small class="text-body-secondary"><?=$courses[$i]["created_at"]?></small></p>
                <a href="Courses-Enrolled.php?course_id=<?=$courses[$i]["course_id"]?>" class="btn btn-primary">View Course</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } else { ?>
    <div class="alert alert-info mt-4">0 courses record found in the database</div>
  <?php } ?>
</div>

<?php include "inc/Footer.php"; ?>
</body>
</html>
<?php
} else { 
  $em = "First login ";
  Util::redirect("../login.php", "error", $em);
}
?>
