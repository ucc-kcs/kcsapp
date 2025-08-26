<?php
include "db.php";

// Fetch all final year projects from DB
$projects = $conn->query("SELECT * FROM final_year_projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Year Projects | KCS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/kcs-logo.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0" style="color:#C62828; font-weight:700;">KCS</h2>
    </a>
</nav>

<!-- Projects Section -->
<div class="container py-5">
    <h1 class="text-center mb-5 text-danger animate__animated animate__fadeInDown">Final Year Projects</h1>
    
    <div class="row">
        <?php if ($projects->num_rows > 0): ?>
            <?php while($project = $projects->fetch_assoc()): ?>
                <div class="col-md-4 mb-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 shadow border-top border-5 border-danger">
                        <div class="card-body">
                            <h4 class="card-title text-danger"><?php echo htmlspecialchars($project['title']); ?></h4>
                            <p class="card-text">
                                <?php echo substr(htmlspecialchars($project['abstract']),0,120); ?>...
                            </p>
                            <a href="project_abstract.php?id=<?php echo $project['id']; ?>" class="btn btn-danger btn-sm mt-2">
                                View Abstract
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="lead">No projects available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
