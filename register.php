<?php
include "db.php";

if (isset($_GET['workshop_id'])) {
    $workshop_id = intval($_GET['workshop_id']);

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM workshops1 WHERE id = ?");
    $stmt->bind_param("i", $workshop_id);
    $stmt->execute();
    $workshop = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$workshop) {
        die("Workshop not found.");
    }
} else {
    die("No workshop selected.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - <?php echo $workshop['title']; ?> | KCS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Meta SEO -->
    <meta name="description" content="Register for <?php echo $workshop['title']; ?> workshop by KCS.">
    <meta name="author" content="Kovai Consultancy Services">

    <!-- Favicon -->
    <link href="img/kcs-logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;600&family=Nunito:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Libraries -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <!-- <img src="img/kcs-logo.png" alt="KCS Logo" height="50" class="me-2"> -->
            <h2 class="m-0" style="color:#C62828; font-weight:700;">KCS</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="courses.php" class="nav-item nav-link">Courses</a>
                <a href="workshops.php" class="nav-item nav-link active">Workshops</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Register Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-light rounded shadow p-5 animate__animated animate__fadeInUp border-top border-5 border-danger">
                    <h2 class="text-center mb-4 text-danger"><?php echo $workshop['title']; ?></h2>
                    <p class="text-center mb-3">
                        <strong>Date:</strong> <?php echo date("d M Y", strtotime($workshop['date'])); ?> |
                        <strong>Time:</strong> <?php echo date("h:i A", strtotime($workshop['time'])); ?>
                    </p>
                    <hr>
                    <form id="registerForm" method="post" action="register_submit.php">
                        <input type="hidden" name="workshop_id" value="<?php echo $workshop_id; ?>">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required minlength="3" placeholder="Enter your full name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" required pattern="\d{10}" title="Enter 10-digit phone number" placeholder="Enter your phone number">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-danger text-light fw-bold shadow-lg px-5 py-3 animate__animated animate__pulse">
                                Register Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-danger text-light footer pt-5 mt-5">
        <div class="container text-center">
            <p class="mb-0">© 2025 Kovai Consultancy Services. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
