<?php include('header.php');?>
<!-- Header-->
<header class="py-5">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
                <h1 class="display-5 fw-bold">E-Learning Application Package for Solving Geometric Problems</h1>
                <p class="fs-4">This study addresses the problems of students’ poor performance in mathematics at the secondary school level. An E-learning application software is developed for teaching solid geometry in senior secondary school to improve students’ attitude and performance in the subject.</p>
                <?php
                    if (loggedin()) {
                ?>
                    <a class="btn btn-primary btn-lg" href="home.php">Dashboard</a>
                <?php
                    }else{
                ?>
                    <a class="btn btn-primary btn-lg" href="home.php">User Login</a>
                <?php
                    }
                ?>
                <a class="btn btn-primary btn-lg" href="admin">Admin Login</a>
            </div>
        </div>
    </div>
</header>
<!-- Page Content-->
<section class="pt-4">
    <div class="container px-lg-5">
        <!-- Page Features-->
        <div class="row gx-lg-5">
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                        <h2 class="fs-4 fw-bold">Read and Learn from Lessons</h2>
                        <p class="mb-0">It covers you to read and learn from those lessons you read.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-cloud-download"></i></div>
                        <h2 class="fs-4 fw-bold">Download Resourced for your Usage.</h2>
                        <p class="mb-0">It covers ou to download related articles, journals, and books needed for your studies.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-card-heading"></i></div>
                        <h2 class="fs-4 fw-bold">Get Tested</h2>
                        <p class="mb-0">After going through those sillabus, it covers you to get tested by the platform.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-bootstrap"></i></div>
                        <h2 class="fs-4 fw-bold">Get an Awesome Congratulations.</h2>
                        <p class="mb-0">After finishing everything needed, after the testes, congratulations you to be on board as soon as possible.</p>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>
<?php include('footer.php'); ?>