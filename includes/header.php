<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $pageTitle ?? 'KCS - Kovai Consultancy Services'; ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- SEO -->
  <meta name="description" content="<?php echo $pageDescription ?? 'Kovai Consultancy Services - Training, Workshops, and Career Growth'; ?>">
  <meta name="author" content="Kovai Consultancy Services">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Fonts & Bootstrap -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <style>
    /* Theme overrides */
    .navbar-brand span {
      color: #C62828 !important; /* Brand red */
    }
    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
      color: #B71C1C !important; /* Active red */
      font-weight: bold;
    }
    .btn-primary {
      background-color: #C62828;
      border-color: #B71C1C;
    }
    .btn-primary:hover {
      background-color: #B71C1C;
      border-color: #7f0000;
    }
    .text-primary {
      color: #C62828 !important;
    }
    .bg-primary {
      background-color: #C62828 !important;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top p-0">
  <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    <!-- <img src="img/kcs-logo1.png" alt="KCS Logo" height="55" class="me-2"> -->
    <span class="fw-bold" style="font-size:1.8rem;">KCS</span>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <a href="index.php" class="nav-item nav-link <?php echo ($activePage=='home'?'active':''); ?>">Home</a>
      <a href="about.php" class="nav-item nav-link <?php echo ($activePage=='about'?'active':''); ?>">About</a>
      <a href="courses.php" class="nav-item nav-link <?php echo ($activePage=='courses'?'active':''); ?>">Courses</a>
      <a href="workshops.php" class="nav-item nav-link <?php echo ($activePage=='workshops'?'active':''); ?>">Workshops</a>
      <a href="contact.php" class="nav-item nav-link <?php echo ($activePage=='contact'?'active':''); ?>">Contact</a>
    </div>
  </div>
</nav>
