<?php
$pageTitle = "Workshop Details | Kovai Consultancy Services";
$pageDescription = "Detailed view of our hands-on workshops at KCS.";
$activePage = "workshops";
include 'includes/header.php';

// DB Connection
$conn = new mysqli("localhost", "root", "", "aakkamkcs_db");
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

// Get workshop ID
$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM workshops1 WHERE id=$id LIMIT 1";
$result = $conn->query($sql);
?>



<section class="container py-5">
  <?php if ($result->num_rows > 0):
      $row = $result->fetch_assoc(); ?>
      <div class="shadow-sm p-5 rounded bg-white border-start border-5" style="border-color:#C62828;">
        <h2 class="fw-bold text-danger"><?php echo $row['title']; ?></h2>
        <p class="mt-3"><?php echo nl2br($row['description']); ?></p>
        
        <ul class="list-unstyled mt-4">
          <li><strong>📅 Date:</strong> <?php echo date("d M Y", strtotime($row['date'])); ?></li>
          <li><strong>⏰ Time:</strong> <?php echo date("h:i A", strtotime($row['time'])); ?></li>
          <li><strong>💰 Fee:</strong> ₹<?php echo $row['price']; ?></li>
          <li><strong>👨‍🏫 Trainer:</strong> <?php echo $row['trainer']; ?></li>
        </ul>

        <a href="register.php?workshop_id=<?php echo $row['id']; ?>" 
           class="btn btn-lg fw-bold text-white mt-3" 
           style="background:#E53935;">Register Now</a>
      </div>
  <?php else: ?>
      <p class="text-center">Workshop not found.</p>
  <?php endif; ?>
</section>

<!-- Workshop Highlights -->
<section class="container py-5">
  <h3 class="text-center text-danger fw-bold mb-4">🌟 Workshop Highlights</h3>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="p-4 text-center shadow-sm rounded bg-light h-100">
        <i class="bi bi-laptop text-danger" style="font-size:2rem;"></i>
        <h5 class="mt-3 fw-bold">Hands-on Projects</h5>
        <p>Work on real-time projects to apply your learning instantly.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-4 text-center shadow-sm rounded bg-light h-100">
        <i class="bi bi-people text-danger" style="font-size:2rem;"></i>
        <h5 class="mt-3 fw-bold">Expert Trainers</h5>
        <p>Learn from experienced professionals with industry knowledge.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-4 text-center shadow-sm rounded bg-light h-100">
        <i class="bi bi-award text-danger" style="font-size:2rem;"></i>
        <h5 class="mt-3 fw-bold">Certificate of Completion</h5>
        <p>Receive a professional certificate to boost your career profile.</p>
      </div>
    </div>
  </div>
</section>

<!-- Related Workshops -->
<section class="container py-5">
  <h3 class="text-center text-danger fw-bold mb-4">🔗 Related Workshops</h3>
  <div class="row g-4">
    <?php
    $related = "SELECT * FROM workshops1 WHERE id != $id ORDER BY date ASC LIMIT 3";
    $relatedResult = $conn->query($related);
    if ($relatedResult->num_rows > 0):
      while($rel = $relatedResult->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="p-4 shadow-sm rounded bg-light h-100 border-start border-4" style="border-color:#C62828;">
            <h5 class="fw-bold text-danger"><?php echo $rel['title']; ?></h5>
            <p><?php echo substr($rel['description'], 0, 100); ?>...</p>
            <p><strong>📅 <?php echo date("d M", strtotime($rel['date'])); ?></strong></p>
            <a href="workshop-detail.php?id=<?php echo $rel['id']; ?>" 
               class="btn btn-sm fw-bold text-white" 
               style="background:#E53935;">View Details</a>
          </div>
        </div>
      <?php endwhile;
    else: ?>
      <p class="text-center">No related workshops available.</p>
    <?php endif; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
