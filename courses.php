<?php
$pageTitle = "Courses | Kovai Consultancy Services";
$pageDescription = "Explore our professional IT courses - Full Stack, Data Science, AI, and more.";
$activePage = "courses";
include 'includes/header.php';

include 'db.php';
?>



<section class="container py-5">
       <h1 class="fw-bold" style="text-align:center;margin-bottom:20px;">Our Courses</h1>

  <div class="row g-4">
    <?php
    $sql = "SELECT * FROM courses1 ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0):
      while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="p-4 shadow-sm rounded bg-light h-100 border-start border-4" style="border-color:#C62828;">
            <h4 class="fw-bold text-danger"><?php echo $row['title']; ?></h4>
            <p><?php echo substr($row['description'], 0, 150); ?>...</p>
            <p><strong>Duration:</strong> <?php echo $row['duration']; ?></p>
            <p><strong>Fee:</strong> ₹<?php echo $row['fee']; ?></p>
            <a href="course_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm fw-bold text-white" style="background:#E53935;">View Details</a>
          </div>
        </div>
      <?php endwhile;
    else: ?>
      <p class="text-center">No courses available currently.</p>
    <?php endif; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
