<?php
include "db.php";

// Get workshop ID and registration ID (if passed)
$workshop_id = isset($_GET['workshop_id']) ? intval($_GET['workshop_id']) : 0;
$registration_id = isset($_GET['reg_id']) ? intval($_GET['reg_id']) : 0;

// Fetch workshop details securely
$workshop = null;
if ($workshop_id) {
    $stmt = $conn->prepare("SELECT * FROM workshops WHERE id = ?");
    $stmt->bind_param("i", $workshop_id);
    $stmt->execute();
    $workshop = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thank You - KCS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/kcs-logo.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <!-- <img src="img/kcs-logo.png" alt="KCS Logo" height="50" class="me-2"> -->
            <h2 class="m-0" style="color:#C62828; font-weight:700;">KCS</h2>
        </a>
    </nav>
    <!-- Navbar End -->

    <!-- Thank You Section -->
    <div class="container py-5 text-center">
        <div class="bg-light rounded shadow p-5 animate__animated animate__zoomIn border-top border-5 border-danger">
            <h1 class="text-danger mb-3">🎉 Thank You!</h1>
            <p class="lead">Your registration has been successfully received.</p>

            <?php if (!empty($workshop)) { ?>
                <h3 class="text-danger mt-4"><?php echo htmlspecialchars($workshop['title']); ?></h3>
                <p>
                    <strong>Date:</strong> <?php echo date("d M Y", strtotime($workshop['date'])); ?> |
                    <strong>Time:</strong> <?php echo date("h:i A", strtotime($workshop['time'])); ?>
                </p>
            <?php } ?>

            <?php if ($registration_id) { ?>
                <p class="fw-bold text-dark">Your Registration ID: <span class="text-danger"><?php echo $registration_id; ?></span></p>
            <?php } ?>

            <a href="workshops.php" class="btn btn-danger text-light fw-bold px-4 py-2 mt-3 animate__animated animate__pulse animate__infinite">
                🔙 Back to Workshops
            </a>
        </div>
    </div>

   

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
