<?php include('includes/header.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="css/style.css" type="text/css">
<div class="highlight-section">
     <div class="container py-5 text-center text-white">
        <h1 class="display-3 mb-4 animate__animated animate__fadeInDown">KCS Upcoming Workshops</h1>
        <p class="lead mb-5 animate__animated animate__fadeInUp">
            Hands-on workshops to boost your skills in Python, Data Science, AI, and more.
        </p>
      <div class="row">
            <div class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                <h4>🐍 Python & Streamlit</h4>
                <p>Learn to create interactive dashboards and real-time data apps with Streamlit.</p>
                <p><strong>Date:</strong> 31 Aug 2025 | <strong>Time:</strong> 11:00 AM - 12:00 PM</p>
            </div>
            <div class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                <h4>🤖 AI & Machine Learning</h4>
                <p>Build and deploy machine learning models with hands-on projects.</p>
                <p><strong>Date:</strong> 7 Sep 2025 | <strong>Time:</strong> 11:00 AM - 12:00 PM</p>
            </div>
            <div class="col-md-4 mb-4 animate__animated animate__fadeInUp animate__delay-3s">
                <h4> Java Full Stack Development Workshop</h4>
                <p>Master Java, Spring Boot, React, and MySQL in this intensive career-focused workshop..</p>
                <p><strong>Date:</strong> 14 Sep 2025 | <strong>Time:</strong> 11:00 AM - 12:00 PM</p>
            </div>
        </div>
        <a href="workshops.php" class="btn btn-lg btn-light text-danger mt-4 animate__animated animate__zoomIn">
            🔎 View All Workshops
        </a>
    </div>
</div>
   <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">        
            <!-- Online Courses -->
            <div class="col-lg-4 col-sm-6 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h5 class="mb-3">Courses</h5>
                        <p>Online classes transform the world into a classroom, where learning has no boundaries and opportunities are endless.</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="courses.php">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Workshops -->
            <div class="col-lg-4 col-sm-6 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h5 class="mb-3">Workshops</h5>
                        <p>Hands-on training sessions designed to boost your skills with real-world projects and live demonstrations.</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="workshops.php">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Final Year Projects -->
            <div class="col-lg-4 col-sm-6 animate__animated animate__fadeInUp animate__delay-3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <h5 class="mb-3">Final Year Projects</h5>
                        <p>A final year project is the bridge between theory and practice, where ideas take shape and dreams begin to materialize.</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="final-year-projects.php">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->

    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
               <!-- Upcoming Workshops Column -->
<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
    <div class="bg-light rounded shadow-lg p-4 h-100">
        <h3 class="text-primary mb-4">📅 Upcoming Workshops</h3>
        
       <?php
       include 'db.php';
      $sql = "SELECT title, DATE_FORMAT(date, '%d %b') as formatted_date FROM workshops1 ORDER BY date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<ul class="list-group list-group-flush">';
    while($row = $result->fetch_assoc()) {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo htmlspecialchars($row['title']);
        echo '<span class="badge bg-warning text-dark">' . $row['formatted_date'] . '</span>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>No workshops available.</p>';
}

$conn->close();



       ?>

        <div class="text-center mt-4">
            <a href="workshops.php" class="btn btn-primary">View All Workshops</a>
        </div>
    </div>
</div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to KCS</h1>
                    <p class="mb-4">KCS is on a mission to educate on technology rather than focusing on providing international certifications by sticking to our one of our quality policy “Only Knowledge Matters”.</p>
                    <p class="mb-4">We stick to the principle of quality education and so our trainers are in 24 / 7 mission to learn new technologies and delivering it with professionalism to our future technocrats and young entrepreneurs .</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Final year projects</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Career guidance</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Website Development</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Mobile App development</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
  <br/><br/><br/><br/>

        
    <?php include('includes/footer.php');?>