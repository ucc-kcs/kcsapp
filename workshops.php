<?php
$pageTitle = "Workshops | Kovai Consultancy Services";
$pageDescription = "Hands-on workshops to learn coding, AI, data science, and more at KCS.";
$activePage = "workshops";
include 'includes/header.php';

include 'db.php';
?>

<header class="py-5 text-white text-center" style="background:#c04931;">
  <div class="container">
    <h1 class="fw-bold"> Upcoming Workshops</h1>
    <p>Hands-on training with real projects</p>
  </div>
</header>

<section class="container py-5">
  <div class="row g-4">
    <?php
    $sql = "SELECT * FROM workshops1 ORDER BY date ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0):
      while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="p-4 shadow-sm rounded bg-light h-100 border-start border-4" style="border-color:#C62828;">
            <h4 class="fw-bold text-danger"><?php echo $row['title']; ?></h4>
            <p><?php echo substr($row['description'], 0, 120); ?>...</p>
            <p><strong>Date:</strong> <?php echo date("d M Y", strtotime($row['date'])); ?></p>
            <p><strong>Time:</strong> <?php echo date("h:i A", strtotime($row['time'])); ?></p>
<a href="workshop-detail.php?id=<?php echo $row['id']; ?>" 
   class="btn btn-sm fw-bold text-white" 
   style="background:#c44d33;">
   View Details
</a>
          </div>
        </div>
      <?php endwhile;
    else: ?>
      <p class="text-center">No upcoming workshops right now.</p>
    <?php endif; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
