<?php

require_once 'core.inc.php';

if (loggedin()) {
    $id = getuserfield('id');
    $name = getuserfield('name');
    $email = getuserfield('email');
    $created_at = getuserfield('created_at');

    include('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4  mb-5 pt-5">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%;">
                <p class="">
                    <h1>Admin Dashboard</h1>
                    <?=$name?><br>
                    <?=$email?><br><?=$created_at?></p>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="pt-2">
                        <a href="/home.php" class="nav-link active text-white">
                            Dashboard <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="users.php" class="nav-link text-white">
                            Users <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="topics.php" class="nav-link text-white">
                            Topics <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="questions.php" class="nav-link text-white">
                            Questions <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="download.php" class="nav-link text-white">
                            Downloads <span class="fab fa-cc-mastercard"></span>
                        </a>
                    </li>
                
                    <hr>
                    <li>
                        <a href="logout.php" class="btn btn-danger mb-3"> Logout out <i class="fa fa-power-off"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md">
            <div class="pt-4">
               <p><h1 class="fw-bold">Admin Dashboard</h1></p>
               <div class="row">
                    <div class="col-md">
                    <div class="card text-center bg-dark text-white border-dark mb-3">
                        <div class="card-body text-white">
                            <h1 class="card-title">
                                <?php
                                    $query = "SELECT * FROM users";
                                    $statement = $con->prepare($query);
                                    $statement->execute();
                                    $count = $statement->rowCount();
                                    echo $count;
                                ?>
                            </h1>
                            <p class="card-text">Users</p>
                            <a href="users.php" class="btn btn-primary">View</a>
                        </div>
                    </div>  
                    <div class="card text-center bg-dark text-white border-dark mb-3">
                        <div class="card-body text-white">
                            <h1 class="card-title">
                                <?php
                                    $query = "SELECT * FROM topics";
                                    $statement = $con->prepare($query);
                                    $statement->execute();
                                    $count = $statement->rowCount();
                                    echo $count;
                                ?>
                            </h1>
                            <p class="card-text">Topics</p>
                            <a href="topics.php" class="btn btn-primary">View</a>
                        </div>
                    </div>  
                    <div class="card text-center bg-dark text-white border-dark mb-3">
                        <div class="card-body text-white">
                            <h1 class="card-title">
                                <?php
                                    $query = "SELECT * FROM tests";
                                    $statement = $con->prepare($query);
                                    $statement->execute();
                                    $count = $statement->rowCount();
                                    echo $count;
                                ?>
                            </h1>
                            <p class="card-text">Questions</p>
                            <a href="test.php" class="btn btn-primary">View</a>
                        </div>
                    </div>  
                    <div class="card text-center bg-dark text-white border-dark mb-3">
                        <div class="card-body text-white">
                            <h1 class="card-title">
                                <?php
                                    $query = "SELECT * FROM download";
                                    $statement = $con->prepare($query);
                                    $statement->execute();
                                    $count = $statement->rowCount();
                                    echo $count;
                                ?>
                            </h1>
                            <p class="card-text">Downloads</p>
                            <a href="download.php" class="btn btn-primary">View</a>
                        </div>
                    </div>  
                    </div>
               </div>
            </div>
        </div>
    </div>

</div>
<?php

include('footer.php'); 

}
else{
    header('Location: login.php');
}