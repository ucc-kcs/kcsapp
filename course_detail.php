<?php
include 'db.php';
$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM courses1 WHERE id = ?");
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0){
    echo "<p>Course not found.</p>"; exit;
}

$course = $result->fetch_assoc();

// Decode JSON fields
$highlights = json_decode($course['highlights'], true);
$leetcode = json_decode($course['leetcode'], true);
$syllabus_frontend = json_decode($course['syllabus_frontend'], true);
$syllabus_backend = json_decode($course['syllabus_backend'], true);
$syllabus_tools = json_decode($course['syllabus_tools'], true);
$syllabus_db = json_decode($course['syllabus_db'], true);
$testimonials = json_decode($course['testimonials'], true);
$faq = json_decode($course['faq'], true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($course['title']); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:'Segoe UI',sans-serif;background-color:#fff8f5;}
.header{background-color:#7b0000;color:white;padding:60px 0;text-align:center;}
.section-title{color:#7b0000;margin-bottom:20px;font-weight:600;}
.card{border:none;box-shadow:0 0 15px rgba(0,0,0,0.05);border-radius:15px;}
.btn-theme{background-color:#7b0000;color:white;}
.btn-theme:hover{background-color:#a30000;color:white;}
</style>
</head>
<body>

<!-- Header -->
<header class="header">
  <h1><?php echo htmlspecialchars($course['title']); ?></h1>
  <p><?php echo htmlspecialchars($course['subtitle']); ?></p>
</header>

<div class="container py-5">

<!-- Highlights -->
<h2 class="section-title text-center">Course Highlights</h2>
<div class="row g-4">
<?php foreach($highlights as $h): ?>
  <div class="col-md-4">
    <div class="card p-3">
      <h5><?php echo htmlspecialchars($h['title']); ?></h5>
      <ul>
        <?php foreach($h['items'] as $item): ?>
          <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endforeach; ?>
</div>


<?php if (!empty($leetcode)) : ?>
<h2 class="section-title text-center mt-5">LeetCode Preparation</h2>
<div class="row g-4 text-center">
  <?php foreach($leetcode as $l): ?>
    <div class="col-md-6">
      <ul class="list-group">
        <?php foreach($l['items'] as $item): ?>
          <li class="list-group-item"><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>



<!-- Syllabus Section -->
<h2 class="section-title text-center mt-5">Course Syllabus</h2>
<div class="row">
  <div class="col-md-6">
    <h5>Frontend</h5>
    <ul class="list-group mb-4">
      <?php foreach($syllabus_frontend as $item): ?>
        <li class="list-group-item">✅ <?php echo htmlspecialchars($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <h5>Tools & Version Control</h5>
    <ul class="list-group mb-4">
      <?php foreach($syllabus_tools as $item): ?>
        <li class="list-group-item">✅ <?php echo htmlspecialchars($item); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-md-6">
    <h5>Backend</h5>
    <ul class="list-group mb-4">
      <?php foreach($syllabus_backend as $item): ?>
        <li class="list-group-item">✅ <?php echo htmlspecialchars($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <h5>Database & Deployment</h5>
    <ul class="list-group mb-4">
      <?php foreach($syllabus_db as $item): ?>
        <li class="list-group-item">✅ <?php echo htmlspecialchars($item); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<!-- Trainer Section -->
<h2 class="section-title text-center mt-5">Resource Person</h2>
<div class="row align-items-center">
  <div class="col-md-4 text-center">
    <img src="<?php echo htmlspecialchars($course['trainer_image']); ?>" class="img-fluid shadow" style="max-width:200px;">
  </div>
  <div class="col-md-8">
    <h4><?php echo htmlspecialchars($course['trainer_name']); ?></h4>
    <p><?php echo nl2br(htmlspecialchars($course['trainer_details'])); ?></p>
  </div>
</div>

<!-- Fee & Enroll -->
<div class="text-center bg-warning p-4 my-5">
  <h3>Course Fee: ₹<?php echo number_format($course['fee'],2); ?></h3>
  <a href="check_email.php" class="btn btn-dark btn-lg mt-3">Enroll Now</a>
</div>

<!-- Testimonials -->
<h2 class="section-title text-center mt-5">Testimonials</h2>
<div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner text-center">
  <?php $active=true; foreach($testimonials as $t): ?>
    <div class="carousel-item <?php echo $active?'active':'';?>">
      <div class="p-4 mx-auto" style="max-width:700px;">
        <p class="fs-5 fst-italic">"<?php echo htmlspecialchars($t['text']); ?>"</p>
        <h5 class="fw-bold mb-0"><?php echo htmlspecialchars($t['name']); ?></h5>
        <small class="text-muted"><?php echo htmlspecialchars($t['company']); ?></small>
      </div>
    </div>
  <?php $active=false; endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev"><span class="visually-hidden">Previous</span></button>
  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next"><span class="visually-hidden">Next</span></button>
</div>

<!-- FAQ Section -->
<h2 class="section-title text-center mt-5">FAQs</h2>
<div class="accordion" id="faqAccordion">
<?php foreach($faq as $index=>$f): ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="faq<?php echo $index;?>-heading">
      <button class="accordion-button <?php echo $index!=0?'collapsed':'';?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $index;?>" aria-expanded="<?php echo $index==0?'true':'false';?>">
        <?php echo htmlspecialchars($f['question']); ?>
      </button>
    </h2>
    <div id="faq<?php echo $index;?>" class="accordion-collapse collapse <?php echo $index==0?'show':'';?>" data-bs-parent="#faqAccordion">
      <div class="accordion-body"><?php echo htmlspecialchars($f['answer']); ?></div>
    </div>
  </div>
<?php endforeach; ?>
</div>

</div>

<!-- Sticky Fee Bar -->
<div class="position-fixed bottom-0 start-0 end-0 bg-warning text-dark py-3 shadow-lg d-flex justify-content-between align-items-center px-4">
  <div class="fw-bold fs-5">💰 Fee: ₹<?php echo number_format($course['fee'],2); ?></div>
  <a href="check_email.php" class="btn btn-dark fw-bold px-4 py-2">Pay Now</a>
</div>

<footer class="bg-dark text-white text-center py-3">&copy; 2025 Aakkam KCS. All rights reserved.</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
