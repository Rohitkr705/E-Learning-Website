<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) && isset($_SESSION['student_id'])) {
    
   if (isset($_GET['course_id'])) {
      include "../Controller/Student/EnrolledStudent.php";
      include "../Controller/Student/Course.php";
      $course_id = Validation::clean($_GET['course_id']);
    } else {
        $em = "Invalid course id ";
        Util::redirect("../Courses.php", "error", $em);
    }

    // Load initial chapter & topic
    $chapters = getFirstChapterByCourseId($course_id);
    $topics = getFirstTopicByCourseId($course_id);
    $_chapter_id = $chapters['chapter_id'];
    $_topic_id = $topics['topic_id'];

    // Overwrite if set in URL
    if(isset($_GET['chapter_id'])) {
        $_chapter_id = Validation::clean($_GET['chapter_id']);
    }
    if(isset($_GET['topic_id'])) {
        $_topic_id = Validation::clean($_GET['topic_id']);
    }

    // Validate page existence
    $psag_exes = isPageExes($course_id, $_chapter_id, $_topic_id);
    if($psag_exes == 0){
         Util::redirect("../404.php", "error", "404");
    }

    // Fetch full course data
    $course = getById($course_id, $_chapter_id, $_topic_id);

    $student_id = $_SESSION['student_id'];
    $data = array($course_id, $student_id);
    $res = check_enrolled_student($data);
    if ($res == 0) {
      $em = "Invalid course id ";
      Util::redirect("Courses.php", "course_id", $course_id);
    }

    // Progress calculation
    $progress = getStudentProgress($course_id, $student_id);
    if ($progress >= 100) $progress = 100;

    $all_chapters = count($course['chapters']);
    $chapter_val = (1 / $all_chapters) * 100;

    // Header
    $title = "EduPulse - ".$course['course']['title'];
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
.side-by-side {
    display: flex;
    flex-wrap: wrap;
}
.l-side {
    flex: 1 1 250px;
    max-width: 250px;
    background: #fff;
    border-radius: 10px;
    margin-right: 20px;
}
.r-side {
    flex: 3 1 600px;
    background: rgba(255,255,255,0.95);
    border-radius: 10px;
}
.list-group-item a {
    text-decoration: none;
}
.progress {
    height: 25px;
}
</style>
</head>
<body>
<div class="container py-4">
  <?php include "inc/NavBar.php"; ?>

  <div class="side-by-side mt-4">
    <div class="l-side shadow p-3">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <b>Course Content</b>
        <button id="sideBtn" class="btn btn-light fs-4"><i class="fa fa-bars"></i></button>
      </div>
      <ul class="list-group" id="sideMenu">
        <?php $i=0; foreach($course['chapters'] as $chapter) { $i++; 
            if ($chapter['chapter_id'] == $_chapter_id) {
                $progress_plus = ($chapter_val*$i);
                if ($progress_plus >= $progress) {
                 updateStudentProgress($course_id, $student_id, $progress_plus);
                }
            }
        ?>
        <li class="list-group-item">
          <a href="javascript:void(0)" class="fw-bold"><?=$chapter['title']?></a>
          <ul class="mt-1">
            <?php foreach($course['topics'] as $topic) { 
              if ($topic['chapter_id'] == $chapter['chapter_id']) {
                $active = ($topic['topic_id'] == $_topic_id) ? 'style="color:#0D6EFD;font-weight:bold;"' : '';
            ?>
            <li>
              <a href="Courses-Enrolled.php?course_id=<?=$course_id?>&chapter_id=<?=$topic['chapter_id']?>&topic_id=<?=$topic['topic_id']?>" class="btn btn-link" <?=$active?>><?=$topic['title']?></a>
            </li>
            <?php } } ?>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div>

    <div class="r-side p-4 shadow">
      <h5><?=$course['course']['title']?></h5>
      <h6><?=$chapter['title']?></h6><hr>  
      <h5><?=$topic['title']?></h5>
      <div class="mt-3">
        <?php if (!empty($course['content']['data'])) echo $course['content']['data']; ?>
      </div>
      <hr>
      <h6>Progress</h6>
      <div class="progress mb-2">
        <div class="progress-bar" role="progressbar" style="width: <?=$progress?>%;" aria-valuenow="<?=$progress?>" aria-valuemin="0" aria-valuemax="100"><?=ceil($progress)?>%</div>
      </div>
      <div class="text-center mt-2">
        <?php if ($progress == 100) { ?>
          <a class="btn btn-success" href="Action/generateCertificate.php?course_id=<?=$course['content']['course_id']?>">Get Certificate</a>
        <?php } else { ?>
          <a class="btn btn-warning disabled" href="#">Get Certificate</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include "inc/Footer.php"; ?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script>
$("#sideBtn").click(function(){
    $("#sideMenu").slideToggle();
});
</script>
</body>
</html>
<?php
} else { 
  $em = "First login ";
  Util::redirect("../login.php", "error", $em);
}
?>
