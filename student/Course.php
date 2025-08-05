<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) && isset($_SESSION['student_id'])) {
    
   if (isset($_GET['course_id'])) {
      include "../Controller/Student/Course.php";
      $_id = Validation::clean($_GET['course_id']);
      $course = getCourseDetails($_id); 
    } else {
        $em = "Invalid course id ";
        Util::redirect("../Courses.php", "error", $em);
    }
    if ($course == 0) {
       $em = "Invalid course id ";
       Util::redirect("Courses.php", "error", $em);
    }

    # Header
    $title = "EduPulse - Course Details";
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
.card {
    margin-top: 30px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
h4.course-list-title {
    text-align: center;
    color: #fff;
    font-weight: bold;
    margin-bottom: 20px;
}
.list-group-item mark {
    background: #fffa;
    border-radius: 5px;
}
</style>
</head>
<body>
<div class="container py-4">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <h4 class="course-list-title">Course Details</h4>
  <div class="card mx-auto" style="max-width: 800px; background: rgba(255, 255, 255, 0.95);">
    <div class="card-body">
      <h5 class="card-title fw-bold">Course Title: <?=$course['title']?></h5>
      <h6 class="pt-3">Course Description:</h6>
      <p class="card-text"><?=$course['description']?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Lessons: <?=$course['topic_nums']?></li>
        <li class="list-group-item">Chapters: <?=$course['chapter_nums']?></li>
        <li class="list-group-item">Instructor: <?=$course['instructor_name']?></li>
        <li class="list-group-item">Created at: <mark><?=$course['created_at']?></mark></li>
        <li class="list-group-item"><mark>Certificate After Complete The Course</mark></li>
    </ul>
    <div class="card-body text-center">
      <?php if ($course['topic_nums'] > 0) { ?>
        <a href="Action/Courses-Enrolled.php?course_id=<?=$course['course_id']?>" class="btn btn-success">Enroll in Course</a> 
      <?php } ?>
    </div>
    <?php if ($course["cover"] != "default_course.jpg") { ?>
    <div>
      <img src="../Upload/thumbnail/<?=$course["cover"]?>" class="img-fluid" alt="course">
    </div>
    <?php } ?>
  </div>
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
