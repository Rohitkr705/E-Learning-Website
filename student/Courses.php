<?php 
session_start();
include "../Utils/Util.php";
if (isset($_SESSION['username']) && isset($_SESSION['student_id'])) {

    include "../Controller/Student/Course.php";
    $row_count = getCount();

    $page = 1;
    $row_num = 6;
    $offset = 0;
    $last_page = ceil($row_count / $row_num);
    if(isset($_GET['page'])){
        if($_GET['page'] > $last_page) $page = $last_page;
        else if($_GET['page'] <= 0) $page = 1;
        else $page = $_GET['page'];
    }
    if($page != 1) $offset = ($page-1) * $row_num;
    $courses = getSomeCourses($offset, $row_num);

    # Header
    $title = "EduPulse - Courses";
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

  <?php if ($courses) { ?>
    <h4 class="course-list-title">All Courses (<?=$row_count?>)</h4>
    <div class="course-list">
    <?php foreach ($courses as $course) { ?>
      <div class="card mb-4">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../Upload/thumbnail/<?=$course["cover"]?>" class="img-fluid rounded-start" alt="course">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?=$course["title"]?></h5>
              <p class="card-text"><?=$course["description"]?></p>
              <p class="card-text"><small class="text-body-secondary"><?=$course["created_at"]?></small></p>
              <a href="Course.php?course_id=<?=$course["course_id"]?>" class="btn btn-primary">View Course</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  <?php } else { ?>
    <div class="alert alert-info mt-4">0 courses record found in the database</div>
  <?php } ?>

  <?php if ($last_page > 1 ) { ?>
  <div class="d-flex justify-content-center mt-3 border rounded p-2 bg-light">
      <?php
        $prev = ($page > 1) ? $page - 1 : 1;
        $next = ($page < $last_page) ? $page + 1 : $last_page;
        $prev_btn = $page > 1;
        $next_btn = $page < $last_page;

        if ($prev_btn) { ?>
          <a href="Courses.php?page=<?=$prev?>" class="btn btn-secondary m-2">Prev</a>
        <?php } else { ?>
          <a href="#" class="btn btn-secondary m-2 disabled">Prev</a>
        <?php }

        $push_mid = ($page >= 2) ? $page - 1 : 1;
        if ($page > 3) $push_mid = $page - 3;

        for($i = $push_mid; $i < $page + 5; $i++) {
          if($i == $page) { ?>
            <a href="Courses.php?page=<?=$i?>" class="btn btn-success m-2"><?=$i?></a>
          <?php } else { ?>
            <a href="Courses.php?page=<?=$i?>" class="btn btn-secondary m-2"><?=$i?></a>
          <?php }
          if($i >= $last_page) break;
        }

        if ($next_btn) { ?>
          <a href="Courses.php?page=<?=$next?>" class="btn btn-secondary m-2">Next</a>
        <?php } else { ?>
          <a href="#" class="btn btn-secondary m-2 disabled">Next</a>
        <?php } ?>
  </div>
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
